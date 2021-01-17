
let dishCart = new Vue({
    el: '#shopping-cart',
    delimiters: ['[[', ']]'],
    data: {
        items: [],
        itemNum: 0
    },
    watch: {
        items: function () {
            this.itemNum = this.items.length;
        }
    },
    methods: {
        submitItems: function () {

        }
    }
});