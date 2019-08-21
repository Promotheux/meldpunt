<template>
  <!-- set a reference to your FormSchema instance -->
  <FormSchema ref="formSchema"/>
</template>

<script>
    import axios from 'axios'
    import FormSchema from '@formschema/native'

    export default {
        props: {
            'formsource': {
                type: String,
                default(){
                    return null;
                }
            }
        },
        created () {

            axios.get('/forms/' + this.formsource).then(({ data }) => {
                this.$refs.formSchema.load(data)
            })
        },
        components: { FormSchema }
    }
</script>
