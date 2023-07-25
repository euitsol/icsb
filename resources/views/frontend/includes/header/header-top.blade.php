<div class="top-header-section">
    <div class="container">
        <div class="header-content-column flex">
            <div class="header-column text-align flex">
                <a href="#">Member's Login</a>
                <a href="#">Students Login</a>
            </div>
            <div class="header-column text-align flex">
                <p>{{ date( 'l, M d, Y', strtotime(Carbon\Carbon::now()) ) }}</p>
                <p>Current Time: {{ date( 'H:i A', strtotime(Carbon\Carbon::now()) ) }} (BST)</p>
            </div>
            <div class="header-column header-info-column text-align flex">
                <a href="tel:8801708030804"><i class="fa-solid fa-phone"></i> +880-1708030804</a>
                <a href="mailto:icsb@icsb.edu.bd"><i class="fa-solid fa-envelope"></i> ICSB@ICSB.EDU.BD</a>
            </div>
        </div>
    </div>
</div>
