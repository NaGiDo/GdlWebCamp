<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>GdlWebCamp</span></h3>
                <p>Nulla in nunc lectus. Proin ac nisl sit amet eros tempus semper sit amet quis mauris. Nam rhoncus commodo enim ut tristique. Integer vel tellus faucibus, commodo enim id, aliquet est. Fusce ac sollicitudin dui. Nulla nec pulvinar nunc.
                    Integer eu leo fringilla, porta velit eu, dignissim dolor. Mauris ultricies arcu dui, in aliquam libero sagittis a.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Ultimos <span>Tweets</span></h3>
                <ul>
                    <li>Nulla in nunc lectus. Proin ac nisl sit amet eros tempus semper sit amet quis mauris. Nam rhoncus commodo enim ut tristique.</li>
                    <li>Nulla in nunc lectus. Proin ac nisl sit amet eros tempus semper sit amet quis mauris. Nam rhoncus commodo enim ut tristique.</li>
                    <li>Nulla in nunc lectus. Proin ac nisl sit amet eros tempus semper sit amet quis mauris. Nam rhoncus commodo enim ut tristique.</li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>Sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>
        <p class="copyright">
            Todos los Derechos Reservados &copy; GDLWEBCAMP 2016.
        </p>
    </footer>
    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.animateNumber.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/jquery.lettering.js"></script>

    <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<script src="js/jquery.colorbox.js"></script>';
        } else if($pagina == 'conferencias'){
            echo '<script src="js/lightbox.js"></script>';
        }

    ?> 
    <script src="js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>