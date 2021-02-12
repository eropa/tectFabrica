<template>
    <div class="col-md-12">
         <div class="card">
             <div class="card-header">Форма обратной связи</div>
             <div class="card-body">

                 <div class="alert alert-danger" role="alert" v-if="statusErors">
                     Что то пошло не так
                 </div>

                 <div class="alert alert-success" role="alert" v-if="statusOk">
                     Вы отпарвили запись
                 </div>

                 <div class="form-group">
                     <label for="formName">Имя</label>
                     <input type="text" class="form-control" id="formName" v-model="fName">
                     <small class="form-text" style="color: red">{{eName}}</small>
                 </div>

                 <div class="form-group">
                     <label for="formPhone">Телефон</label>
                     <input type="text" class="form-control" id="formPhone" v-model="fPhone">
                     <small  class="form-text" style="color: red">{{ePhone}}</small>
                 </div>

                 <div class="form-group">
                     <label for="formText">Сопроводительный текст</label>
                     <textarea class="form-control" id="formText" rows="3" v-model="fText"></textarea>
                     <small class="form-text" style="color: red">{{eText}}</small>
                 </div>

                 <button type="button" class="btn btn-success" v-if="showSpiner==0" v-on:click="btnSend">Отправить</button>

                 <div class="spinner-border text-success" role="status" v-if="showSpiner==1">
                     <span class="sr-only">Loading...</span>
                 </div>

             </div>
         </div>
    </div>
</template>

<script>
    export default {
        name: "ContactComponent",
        data() {
            return {
                showSpiner:0,
                fName:"",
                fPhone:"",
                fText:"",
                statusErors:0,
                eName:"",
                ePhone:"",
                eText:"",
                statusOk:0,
            }
        },
        methods: {
            btnSend:function () {

                this.showSpiner=1;
                this.statusErors=0;
                this.eName="";
                this.ePhone="";
                this.eText="";
                this.statusOk=0;

                axios.post('/sendcontact', {
                    'fName':this.fName,
                    'fPhone':this.fPhone,
                    'fText':this.fText,
                }).then (
                    (response)=>{
                        this.showSpiner=0;
                        this.statusErors=0;
                        this.statusOk=1;
                    },
                    (error) => {
                        let lName="";
                        let lPhone="";
                        let lText="";
                        // Выводим сообщение об ощибке
                        $.each( error.response.data.errors, function( key, value ) {
                            if(key=="fName")
                                lName=value[0];
                            if(key=="fPhone")
                                lPhone=value[0];
                            if(key=="fText")
                                lText=value[0];
                        });
                        this.eName=lName;
                        this.ePhone=lPhone;
                        this.eText=lText;

                        this.showSpiner=0;
                        this.statusErors=1;
                    }
                );
            },
        }
    }
</script>

<style scoped>

</style>

