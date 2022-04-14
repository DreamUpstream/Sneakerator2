import { defineStore } from "pinia";
import axios from "axios";

export const useTokensStore = defineStore("token", {
    state: () => ({
        tokens: 0,
        user_id: null,
    }),

    getters: {
        data: (state) => {
            return {
                tokens: state.tokens,
            };
        },
    },

    actions: {
        get(user_id) {
            this.user_id = user_id;
            axios
                .get(`/api/sneakers/tokens?user_id=${user_id}`)
                .then((response) => {
                    this.tokens = response.data.data[0].tokens;
                });
        },

        add(amount) {
            let url = "/api/sneakers/tokens";
            this.tokens = this.tokens + amount;
            axios.post(url, {
                user_id: this.user_id,
                amount: this.tokens + amount,
            });
        },
        remove(amount) {
            let url = "/api/sneakers/tokens";
            this.tokens = this.tokens - amount;
            axios.post(url, {
                user_id: this.user_id,
                amount: this.tokens - amount,
            });
        },
    },
});
