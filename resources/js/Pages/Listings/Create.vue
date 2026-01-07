<template>
  <form @submit.prevent="submit">
    <div>
      <div>
        <label>Beds</label>
        <input v-model="form.bed" type="text" />
      </div>

      <div>
        <label>Baths</label>
        <input v-model="form.bath" type="text" />
         <div v-if="form.errors.bath">
          {{ form.errors.bath }}
        </div>
      </div>

      <div>
        <label>Area</label>
        <input v-model="form.area" type="text" />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>

      <div>
        <label>City</label>
        <input v-model="form.city" type="text" />
         <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>

      <div>
        <label>Post Code</label>
        <input v-model="form.code" type="text" />
         <div v-if="form.errors.code">
          {{ form.errors.code }}
        </div>
      </div>

      <div>
        <label>Street</label>
        <input v-model="form.street" type="text" />
         <div v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>

      <div>
        <label>Street Nr</label>
        <input v-model="form.street_nr" type="text" />
         <div v-if="form.errors.street_nr">
          {{ form.errors.street_nr }}
        </div>
      </div>

      <div>
        <label>Price</label>
        <input v-model="form.price" type="text" />
         <div v-if="form.errors.price">
          {{ form.errors.price }}
        </div>
      </div>

      <div>
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3'


const form = useForm({
  bed: '',
  bath: '',
  area: '',
  city: '',
  code: '',
  street: '',
  street_nr: '',
  price: '',
})

const submit = () => {
  form.post(route('listings.store'))
}
</script>

<style scoped>
label {
  margin-right: 2em;
}

div {
  padding: 2px;
}
</style>
