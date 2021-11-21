export default {
    methods: {
        showSavedNotification() {
            this.$bvToast.toast('Saved!', {
                title: 'Success',
                autoHideDelay: 5000,
                appendToast: false,
                variant: 'success'
            }) ; 
        },
        showErrorNotification(errorResponse) {
            let errorMessage;

            for (const error in errorResponse.response.data.errors)
            {
                errorMessage = errorResponse.response.data.errors[error][0]
                break;   
            }

            this.$bvToast.toast(errorMessage, {
                title: 'Error',
                autoHideDelay: 5000,
                appendToast: false,
                variant: 'danger'
            }) ; 
        },
    }
}
