<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Send Mail</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>
   <body>
      <div class="row">
         <center>
            <div class="col-md-6">
            <form action="{{ route('kirim_email') }}" class="contact100-form validate-form" method="post">
               @csrf
               <h4> Contact Form </h4>
               @if(session()->has('message'))
               <div class="alert alert-success">
                  {{ session()->get('message') }}
               </div>
               @endif
               <hr>
               {{-- <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" required>
               </div> --}}
               <br>
               <div class="form-group">
                  <label>Email</label>
                  {{-- <input type="text" name="email" class="form-control" required> --}}
                  <select class="form-control" name="email" required>
                     <option selected disabled value="">Pilih Penerima</option>
                     <option value="all"> <b>- Kirim ke semua user -</b> </option>
                     @foreach($user as $val_user)
                     <option value="{{ $val_user->email }}">{{ $val_user->email }}</option>
                     @endforeach
                  </select>
               </div>
               <br>
               <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" required>
               </div>
               <br>
               <div class="form-group">
                  <label>Message</label>
                  <textarea name="content" class="form-control" rows="8"></textarea>
               </div>
               <br>
               <div class="d-grid gap-2">
                  <button class="btn btn-success btn-block"> Submit </button>
               </div>
            </form>
         </div>
         </center>
      </div>
   </body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>