new Vue({
    el: "#practitioner",

    data: {
        id: '',
        nin: '',
        national_id: '',
        valid: '',
        user_id: '',
        name: '',
        license: '',
        profession: '',
        professions: {
            0: "Nurse",
            1: "Doctor",
            2: "Lab Techician",
            3: "Pharmacist"
        },
        practitionals: [],
        practitional: ''

    },
    created() {
        this.onLoad();
        //this. getInfo();  
    },
    methods: {
        onLoad() {
            this.nin="";
            axios.get('/Practitionals')
                .then(({ data }) => this.practitionals = data);
            },
        getInfo(){
            this.name = "";
            axios.get('/user/'+this.nin)
            .then(({data}) => {

                this.user_id = data[0].id;
                this.name = data[0].firstname + " " + data[0].lastname;
                this.getPat(this.user_id);

            });    
        },
        getInfo1() {
            this.name = "";
            axios.get('/user/' + this.nin)
                .then(({ data }) => {

                    this.user_id = data[0].id;
                    this.name = data[0].firstname + " " + data[0].lastname;
                    //this.getPat(this.user_id);

                });
        },
        clear() {
            this.nin = this.name = this.profession = this.valid = this.license = '';
        },
        onSubmit() {
            axios.post('/Practitionals', this.$data)
                .then(this.onSuccess)
                .catch(error => {
                    alert(error.response.data.message)
                });
        },
        onSuccess(response) {
            //this.message = response.data.message;
            alert(response.data.message);
            this.onLoad();
            this.clear();
            $("#edit").modal('close');
        },
        newPrat(){
           // this.clear();
            this.name = this.nin = "";
            $("#new").modal("show");
            
        },
        edit(practitional) {
            $("#edit").modal("show");
            this.name = practitional.user.firstname + " " + practitional.user.lastname;
            this.nin = practitional.user.national_id;
            this.valid = practitional.valid;
            this.profession = practitional.profession;
            this.license = practitional.license;
            this.user_id = practitional.user.id;
            this.id = practitional.id;
            //alert(dependent.id);
        },
        onUpdate(){
            
            axios.put('/Practitionals/'+this.id, this.$data)
            .then(this.onSuccess)
            .catch(error => {
                alert(error.response.data.message)
            });
            
        },
        confirm(id) {
            this.id = id;
          //  alert(this.id)
            $("#delete").modal("show");
        },
        onDelete() {
            axios.delete('/Practitionals/' + this.id)
                .then(response => {
                    alert(response.data.message);
                    this.onLoad();
                });
        },
        getPat(id){
            axios.get('/Practitionals/'+id+'/edit')
                .then(({ data }) => {
                    if(data.length > 0)
                    {
                        this.practitionals = data
                    }else{
                        this.name = this.nin = "";
                        alert('No record found!');
                    }
                });
        }  
    }
});