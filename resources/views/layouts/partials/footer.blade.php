<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>{{\Carbon\Carbon::now()->year}} &copy; {{ env('APP_NAME')}} </p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="{{ env('APP_URL')}} " target="_blank">{{ env('APP_NAME')}} </a></p>
        </div>
    </div>
</footer>
