new Vue({
    el: "#dependent",

    data: {
        id: '',
        dob: '',
        user_id: '',
        name: '',
        relationship: '',
        relationships: {
            0: "Son",
            1: "Daughter",
            2: "Nephew",
            3: "Nice"
        },
        dependent: '',
        dependents: []

    },
    created() {
        this.onLoad();
        this.userID();
    },
    methods: {
        onLoad() {
            axios.get('/Dependent')
                .then(({ data }) => this.dependents = data);
            },
        userID() {
            axios.get('/userId')
                .then(({ data }) => this.user_id = data[0].id);
        },
        clear() {
            this.dob = this.name = this.relationship = '';
        },
        onSubmit() {
            axios.post('/Dependent', this.$data)
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
        newDep(){
            this.clear();
            $("#new").modal("show");
            
        },
        edit(dependent) {
            $("#edit").modal("show");
            this.name = dependent.name;
            this.dob = dependent.dob;
            this.relationship = dependent.relationship;
            this.id = dependent.id;
            //alert(dependent.id);
        },
        onUpdate(){
            
            axios.put('/Dependent/'+this.id, this.$data)
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
            axios.delete('/Dependent/' + this.id)
                .then(response => {
                    alert(response.data.message);
                    this.onLoad();
                });
        }  
    }
});