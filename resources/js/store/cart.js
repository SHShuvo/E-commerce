import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
    state: () => ({ cart: [] }),
    actions: {
        removeProductFromCart(prod_id){
            const index = this.cart.findIndex(el=> el.id === prod_id);
            this.cart.splice(index, 1);
        }
    },
    persist: true,
})