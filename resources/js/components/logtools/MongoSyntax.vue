<template>
    <div class="card">
        <div class="card-header">
            {{ title }}
        </div>
        <div class="card-body">
            <form @submit.prevent method="POST" action="https://www.google.com">
                @csrf

                <div class="form-group row">
                    <label for="logType" class="col-md-4 col-form-label text-md-right">Log Type</label>

                    <div class="col-md-6">
                        <select v-model="generateForm.logType" class="form-control form-control-sm" id="logType" name="logType" autofocus>
                            <option v-for="option in logTypeOptions" :value="option.value">
                                {{ option.text }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startDate" class="col-md-4 col-form-label text-md-right">Start Date</label>

                    <div class="col-md-6">
                        <input v-model="generateForm.startDate" id="startDate" type="text" class="form-control form-control-sm" name="startDate">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endDate" class="col-md-4 col-form-label text-md-right">End Date</label>

                    <div class="col-md-6">
                        <input v-model="generateForm.endDate" id="endDate" type="text" class="form-control form-control-sm" name="endDate">
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
export default {
    data() {
        return {
            title: 'MongoDB Syntax Generator',
            errorMessage: '',
            generateForm: {
                logType: '02',
                startDate: '',
                endDate: '',
                logData: '',
            },
            mongoSyntax: '',
            hasError: false,

            logTypeOptions: [
                { text: 'Invoice_B2B', value: '01'},
                { text: 'Invoice_B2C', value: '02'},
                { text: 'Invoice_MultimediaPrint', value: '03'},
            ]
        }
    },
    methods: {
        generateSyntax: function () {
            console.log('generateSyntax');
            this.mongoSyntax = ''
            let queryString = Object.keys(this.generateForm).map(key => key + '=' + this.generateForm[key]).join('&');
            let url = 'https://demo-dev.ecpay.com.tw/api/v1/log/legacy-query-sync-generator?'  + queryString;
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
        }
    }
}
</script>