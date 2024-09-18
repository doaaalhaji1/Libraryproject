<style>
    .form-container {
      display: flex;
      align-items: center;
      justify-content:evenly;
      padding: 10px;
      background-color: transparent;
    }

    .form-container label {
      margin-right: 15px;
      margin-left: 15px;
      white-space: nowrap;
      font-weight: 500;
    }

    .form-select {
      border-radius: 5px;
      border: 1px solid #ced4da;
      background-color: #ffffff;
    }

    .form-select:focus {
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .form-label {
      font-size: 1rem;
      color: #495057;
    }
</style>

<form method="GET" action="{{ route('setLocale') }}" class="d-inline">
    <div class="form-container">
        <label for="locale" class="form-label mt-1">{{ __('public.Choose_Language') }}</label>
        <select name="locale" id="locale" onchange="this.form.submit()" class="form-select form-select-sm">
            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ar" {{ session('locale') == 'ar' ? 'selected' : '' }}>العربية</option>
        </select>
    </div>
</form>
