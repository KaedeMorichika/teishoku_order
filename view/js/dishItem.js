
let dishItem = {

    props: {
        dishJson: {
            type: Object,
            required: true
        }
    },

    data: function () {
        return {
            dish: this.dishJson,
            options: this.dishJson.options,
            dishNum: 1,
            isActive: false
        }
    },

    template:`
<div>
    <button class="btn dish-btn" @click="formActivate">
        <div>{{dish.name}}</div>
        <div>&yen;{{dish.price}}</div>
    </button>
    <div>{{dish.info}}</div>
    <div v-show="isActive">
        <div>
            <input v-model="dishNum" type="text">個
        </div>
        <div v-if="options" style="margin-left: 15px">
            <div v-for="option in options">
                <label><input type="checkbox" v-model="option.isSelected"><span>{{option.name}}</span></label>
            </div>
        </div>
        <div>
            <button @click="add2Cart">買い物カートへ</button>
        </div>
        <button @click="formInactivate">閉じる</button>
    </div>
</div>
    `,
    methods: {
        formActivate: function () {
            this.isActive = ! this.isActive;
        },
        formInactivate: function () {
            this.isActive = false;
        },
        add2Cart: function () {
            let dishOrder = {
                dish_id: this.dish.id,
                dish_name: this.dish.name,
                dish_num: this.dishNum
            };
            if (this.options) {
                dishOrder.dish_options = [];
                for (let option of this.options) {
                    if (option.isSelected) {
                        dishOrder.dish_options.push(option);
                    }
                }
            }
            dishCart.items.push(dishOrder);
        }
    },
    mounted: function () {
        if (this.options) {
            for (let option of this.options) {
                option.isSelected = false;
            }
        }
    }
}