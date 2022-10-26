<footer>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-2  col-sm-4 col-6  footer-menu">
                <h4 class="rubik-bold text-white">Меню</h4>
                <ul class="nav flex-column justify-content-between">
                    <x-controls.list text="Главная" route="index" classes=" nav-link p-0 m-0 text-white" color="secondary"/>
                    <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link p-0 m-0 text-white" color="secondary"/>
                    <x-controls.list text="О нас" route="about_us" classes="nav-link p-0 m-0 text-white" color="secondary" />
                </ul>
            </div>

            <div class="col-lg-2 col-sm-4 col-6 company-contacts">
                <h4 class="rubik-bold text-white">Контакты</h4>
                <ul class="nav flex-column ">
                    <li class="nav-item mb-2 text-white">+7-953-954-20-16</li>
                    <li class="nav-item mb-2 text-white">tricolor-nsk@mail.ru</li>
                    <li class="nav-item mb-2 text-white">г.Новомосковск</li>
                    <li class="nav-item mb-2 text-white">ул. Садовского д.34</li>
                </ul>
            </div>



            <div class="col-lg-8 col-sm-4 ">
            </div>
        </div>


        <div class="justify-content-center text-center text-white company-name ">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>
    </div>
    <div class="position-relative">
        <img id="linesf" class="position-absolute bottom-0 end-0" src="{{asset('images/linesf.svg')}}">
    </div>
</footer>

<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2aecac75b358a6d10ac59051e500a2345a3538f1563e36dd85f799fdc16535f9&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script></div>

