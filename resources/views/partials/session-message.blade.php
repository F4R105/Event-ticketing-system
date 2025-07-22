 <!-- Session Message -->
 @if (session('status'))
     <div class="mb-4 text-sm text-red-600">
         {{ session('status') }}
     </div>
 @endif
