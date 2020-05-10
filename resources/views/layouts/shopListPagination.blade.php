<!-- pagination-area-start -->
<div class="pagination-area mt-50">
    <div class="list-page-2">
        <p>Items {{$comics->count()}} of {{$comics->total()}}</p>
    </div>
    <div class="page-number">
        <ul>
            <li> {{$comics->render()}} </li>
        </ul>
    </div>
</div>
<div class="pt-30"></div>
<!-- pagination-area-end -->