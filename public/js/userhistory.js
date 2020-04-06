new Vue({
    el: '#consult',

    data: {
        id: '',
        user_id: '',
        national_id: '',
        name: '',
        nin: '',
        temp: '',
        bp: '',
        bsl: '',
        pulse: '',
        height: '',
        weight: '',
        bmi: '',
        created: '',
        diagnosis: '',
        symptoms: '',
        complain: '',
        remarks: '',
        tests: [],
        test: '',
        consult: '',
        consults: [],
        user: '',
        users: [],
        drugs: '',
        prescriptions: ''

    },
    created() {
        this.getMedPract();
        this.onLoad();
        this.getName();

    },
    methods: {
        getMedPract() {
            axios.get('/medpract')
                .then(({ data }) => this.users = data);
        },
        getName(e) {
            for (var i = 0; i < this.users.length; i++) {
                if (this.users[i].id == e) {
                    return this.users[i].firstname + ' ' + this.users[i].lastname;
                }
            }

        },
        onBMI() {
            this.bmi = parseInt(this.weight) / parseInt(this.height);
        },
        onLoad() {
            axios.get('/usermedhistory')
                .then(({ data }) => this.consults = data);
        },
        getMed() {

            this.getMedPract();
            this.getInfo();
            this.getName();

        },
        viewInfo(e) {
            this.temp = e.temp;
            this.bmi = e.weight / e.height;
            this.bp = e.bp;
            this.pulse = e.pulse;
            this.complain = e.complain
            this.symptoms = e.symptoms;
            this.diagnosis = e.diagnosis;
            this.remarks = e.remarks;
            this.id = e.id;
            this.created = e.created_at;
            this.getLab();
            this.getPham();
            $("#details").modal('show');

        },
        getLab() {
            axios.get('/labtest/' + this.id)
                .then(({ data }) => this.tests = data);
        },
        getPham() {
            axios.get('/drugs/' + this.id)
                .then(({ data }) => {
                    this.drugs = data[0].drugs,
                    this.prescriptions = data[0].prescription
            });
        }
    }
});