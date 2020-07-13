<style>
    .DGDcomicsLink{
        color: #f07c29;
    }

    .DGDcomicsLink:hover{
        color: #ffb400;
    }
</style>

<!-- section-element-area-start -->
<div class="section-element-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="entry-header text-center mb-20">
                    <img src="{{asset('img/immaginiNostre/error404.png')}}" alt="not-found-img" />
                    <div class="mt-4"></div>
                    <p><b>Oops! a quanto pare questa pagina non esiste!</b></p>
                </div>
                <div class="entry-content text-center mb-30">
                    <p>A quanto pare la pagina da lei cercata non è stata trovata o non esiste; la preghiamo di controllare se ha inserito correttamente l'URL.</p>
                    <p>Se invece lei è arrivata in questa pagina a causa di un errore del nostro sito e l'errore persiste la preghiamo di <a href="{{ url('/contact') }}" class="DGDcomicsLink">contattarci</a>.</p>
                    <a href="{{ url('/') }}" class="DGDcomicsLink">Torna alla Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section-element-area-end -->