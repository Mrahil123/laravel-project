<x-card class="mb-5">
  <div class="flex shadow-lg p-5">
    <div>

      <img class="hidden w-48 mr-6 md:block"
      src="{{asset('/images/no image.png')}}" alt="" />
      <div class="mt-4">
        <form action="/upload/{{auth()->user()->id}}" method="post">
          @csrf
          @method("PUT")
          <input type="file" name="photo" class="w-full mb-2">
          <button class="bg-blue-800 rounded px-4 py-2">Update</button>
      </form>
      @error('photo')
          <h1>{{$message}}</h1>   
      @enderror
      </div>
    </div>
    <div class="w-full">
      <h3 class="text-2xl mb-1">
        <a href="#">listing title</a>
      </h3>
      <p>Tenderers shall ensure that their tenders, duly sealed and signed, complete in all respects as per instructions contained in the Tender Documents, are dropped in the tender box located at the address given below on or before the closing date and time indicated in the Para 1 above, failing which the tenders will be treated as late and rejected.</p>
    </div>
    
  </div>
</x-card>