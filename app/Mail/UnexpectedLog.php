<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;

class UnexpectedLog extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Exception
     *
     * @var Exception
     */
    private $exception;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $record)
    {
        $this->exception = data_get($record, 'context.exception');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $viewData = [
            'content' => $this->getContent($this->exception),
        ];
        
        return $this->to($this->getConfig('recipient'))
                    ->subject($this->getSubject())
                    ->view('emails.unexpectedlog', $viewData);
    }

    /**
     * 過濾內容
     *
     * @param  string $content
     * @return string
     */
    private function filterContent($content)
    {
        $ip = $this->getSummaryPiece(request()->ip());
        $userAgent = $this->getSummaryPiece($this->getUserAgent());

        $search = '<div class="exception-summary">';
        $replaced = $search . '<div class="container">' . $ip . $userAgent . '</div>';

        return str_replace($search, $replaced, $content);
    }

    /**
     * 取得設定
     *
     * @param  string $key
     * @return mixed
     */
    private function getConfig($key)
    {
        return config('cf.logging.unexpected.mail.' . $key);
    }

    /**
     * 取得內容
     *
     * @param  Exception $e
     * @return string
     */
    private function getContent(Exception $e)
    {
        $e = FlattenException::create($e);
        $handler = new SymfonyExceptionHandler;
        
        $content = $handler->getHtml($e);

        return $this->filterContent($content);
    }

    /**
     * 取得標題
     * format: <project>-<desc>-<host>
     *
     * @return string
     */
    private function getSubject()
    {
        $project = $this->getConfig('subject.project');
        $desc = $this->getConfig('subject.desc');
        $hostname = gethostname();

        return implode('-', compact(['project', 'desc', 'hostname']));
    }

    /**
     * 取得總結碎片
     *
     * @param  string $value
     * @return string
     */
    private function getSummaryPiece($value)
    {
        return '<div style="color:#FFF">' . $value . '</div>';
    }

    /**
     * 取得 UserAgent
     *
     * @return void
     */
    private function getUserAgent()
    {
        return (!empty($_SERVER['HTTP_USER_AGENT'])) ? htmlspecialchars($_SERVER['HTTP_USER_AGENT']) : '';
    }
}
