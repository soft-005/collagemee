<?php include('includes/header.php'); ?>
 <title>CollageMe - Account Recovery</title>  
</head>
<?php include('includes/nav.php'); ?>
<div class="row py-5" style="background:linear-gradient(to bottom, #08070e 0%, #08070e 100%, rgba(8,7,14,0) 100% ) no-repeat;">
    <div class="col-10 col-lg-4 col-md-5 mx-auto mt-7 bg-white border border-gray-200 rounded-xl shadow-2xs dark:bg-neutral-900 dark:border-neutral-700">
  <div class="p-4 sm:p-7">
    <div class="text-center">
      <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>
      <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
        Remember your password?
        <a class="text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-blue-500" href="./login.php">
          Sign in here
        </a>
      </p>
    </div>

    <div class="mt-5">
      <!-- Form -->
      <form>
        <div class="grid gap-y-4">
          <!-- Form Group -->
          <div>
            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
            <div class="relative">
              <input type="email" id="email" name="email" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" required aria-describedby="email-error">
              <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
            </div>
            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
          </div>
          <!-- End Form Group -->

          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Reset password</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>

</div>
<script src="./assets/js/main.min.js" type="text/javascript"></script>
</body>
</html>