<template>
    <div class="card">
        <div class="card-header">
            {{ title }}
        </div>
        <div class="card-body">
            <form @submit.prevent method="POST">
                <div class="form-group row">
                    <label for="logType" class="col-md-4 col-form-label text-md-right">Log Type</label>

                    <div class="col-md-6">
                        <select v-model="generateForm.logType" class="form-control form-control-sm" id="logType" name="logType" autofocus>
                            <option v-for="(option, index) in logTypeOptions" :value="option" :key="index">
                                {{ option }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startDate" class="col-md-4 col-form-label text-md-right">Start Date</label>

                    <div class="col-md-6">
                        <date-picker
                            v-model="generateForm.startDate"
                            format="YYYY-MM-DD HH:00"
                            value-type="format"
                            type="datetime"
                            input-class="form-control form-control-sm"
                        ></date-picker>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endDate" class="col-md-4 col-form-label text-md-right">End Date</label>

                    <div class="col-md-6">
                        <date-picker
                            v-model="generateForm.endDate"
                            format="YYYY-MM-DD HH:00"
                            value-type="format"
                            type="datetime"
                            input-class="form-control form-control-sm"
                        ></date-picker>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logData" class="col-md-4 col-form-label text-md-right">Log Data</label>

                    <div class="col-md-6">
                        <input v-model="generateForm.logData" id="logData" type="text" class="form-control form-control-sm" name="logData">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button v-on:click="generateSyntax" class="btn btn-primary">
                            Generate
                        </button>
                    </div>
                </div>
            </form>

            <div class="mb-3">
                <label for="mongoSyntax" class="form-label">Syntax</label>
                <textarea v-model="mongoSyntax" class="form-control" id="mongoSyntax" placeholder="Syntax"></textarea>
            </div>

            <div class="mb-3">
                <div :class="{ 'd-none': !hasError }" class="alert alert-danger" role="alert">{{ errorMessage }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import moment from 'moment';

export default {
    components: {
        DatePicker
    },
    data() {
        return {
            title: 'MongoDB Syntax Generator',
            errorMessage: '',
            generateForm: {
                logType: 'Invoice_B2B',
                startDate: this.getDateTimeAfterDays(),
                endDate: this.getDateTimeAfterDays(1),
                logData: '',
            },
            mongoSyntax: '',
            hasError: false,

            logTypeOptions: [
                'Invoice_B2B',
                'Invoice_B2C',
                'Invoice_MultimediaPrint',
            ],
        }
    },
    methods: {
        generateSyntax: function () {
            console.log('generateSyntax');
            this.mongoSyntax = ''
            let queryString = Object.keys(this.generateForm).map(key => key + '=' + this.generateForm[key]).join('&');
            let url = this.apiUrl + '?'  + queryString;
            axios({
                method: 'GET',
                url: url,
                data: this.generateForm
            })
            .then(res => {
                if (res.status === 200) {
                    this.mongoSyntax = res.data.data;
                } else {
                    res.doesNotExist.throwAnError;
                }
            })
            .catch(error => {
                this.hasError = true;
                this.errorMessage = '查無資料';
            })
        },
        // 取得日期時間
        getDateTimeAfterDays(afterDays = 0) {
            const dateString = moment().add(afterDays, 'days').format('YYYY-MM-DD 00:00');
            return dateString;
        },
    },
    props: ['apiUrl'],
}
</script>