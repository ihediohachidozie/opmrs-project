
new Vue({
      el: "#index",

      data: {
        dob: '',
        name: '',
        relationship: '',
        relationships: {
          0: "Son",
          1: "Daughter",
          2: "Nephew",
          3: "Nice"
        }

      },
      created(){
      //  alert('You are in index');
      //  this.items = this.all;
      },
      methods:{
        clear(){
          this.bp=this.pulse='';
        },
        saveItem(){
          //alert('Hello World!')
          this.all.push(this.bp);
          this.items = this.all;
        }
      }
    });

    var consult = new Vue({
      el: "#consult",

      created(){
       // alert('You are in Consult');
      }
    }); 