<template>
  <div>
    <!-- Flash message -->
    <div v-if="page.props.flash?.success" class="bg-green-100 text-green-800 p-2 rounded mb-4">
      {{ page.props.flash.success }}
    </div>

    <form @submit.prevent="submit">
      <div v-for="field in fields" :key="field.name" class="mb-2">
        <label :for="field.name" class="block font-bold">{{ field.label }}</label>
        <input
          :id="field.name"
          v-model="form[field.name]"
          type="text"
          class="border p-1 w-full"
        />
        <div v-if="form.errors[field.name]" class="text-red-600 text-sm">
          {{ form.errors[field.name] }}
        </div>
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Update Listing
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3'

const page = usePage()
const listing = page.props.listing

// Fields array to loop in template
const fields = [
  { name: 'bed', label: 'Beds' },
  { name: 'bath', label: 'Baths' },
  { name: 'area', label: 'Area' },
  { name: 'city', label: 'City' },
  { name: 'code', label: 'Post Code' },
  { name: 'street', label: 'Street' },
  { name: 'street_nr', label: 'Street Nr' },
  { name: 'price', label: 'Price' },
]

// Initialize form with existing listing data
const form = useForm({
  bed: listing.bed || '',
  bath: listing.bath || '',
  area: listing.area || '',
  city: listing.city || '',
  code: listing.code || '',
  street: listing.street || '',
  street_nr: listing.street_nr || '',
  price: listing.price || '',
})

// Submit function for updating
const submit = () => {
  form.put(route('listings.update', listing.id))
}
</script>

<style scoped>
label {
  margin-bottom: 0.25rem;
}
</style>
