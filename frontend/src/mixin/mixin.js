import axios from "../config/apiRequest";
import { useToast } from "vue-toastification";

export const globalMixin = {

    data() {
        return {
            toastG: useToast(),
        }
    },
    methods: {

        async makeRequest(requestType = 'get', url, data = {}, optionalConfig = {}, showSuccessMsg = true,showErrorMsg = true) {
            
            let responseFormat = {}
            let requestObj = null;
            switch (requestType) {
                case 'get':

                    requestObj = axios.get(url, {params: data});
                    break;

                case 'post':
                    requestObj = axios.post(url, data, optionalConfig);
                    break;

                case 'put':
                    requestObj = axios.put(url, data, optionalConfig);
                    break;

                case 'delete':
                    requestObj = axios.delete(url, data);
                    break;

                default:
                    /*if no params matches in switch case*/
                    requestObj = axios.get(url, {params: data});

            }
            // this.$store.dispatch('setLoader',true)
            await requestObj.then(callResponse => {
                /*success*/
                responseFormat.error = false;
                responseFormat.response = callResponse;
                let success = callResponse.data.success
                if (success) {
                    if (showSuccessMsg)
                        this.toastG.success(callResponse.data.message)
                }else{
                    responseFormat.error = true;
                    if(showErrorMsg)
                        this.toastG.error(callResponse.data.message)
                }

            }).catch(error => {
                responseFormat.error = true;
                responseFormat.response = error;

                this.toastG.error('Error! An error occurred')

            }).finally(() => {
                // this.$store.dispatch('setLoader',false)

            });


            return responseFormat;
        },

    },

}