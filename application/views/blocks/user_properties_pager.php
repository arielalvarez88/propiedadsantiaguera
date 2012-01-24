<div id="user-properties-pager">



    <?php for ($i = 0; $i < 8; $i++): ?>
        <div class="user-properties-pager-property <?php echo ($i + 1) % 4 == 0 ? 'user-properties-pager-property-last' : ''; ?>">
            <a href="#todavia-no-echo" class="no-decoration-anchor">
                <img class="user-properties-pager-properties-photo no-decoration-anchor" src="<?php base_url();?>/images/slide1.jpg"/>
                 </a>
                <h3 class="user-properties-pager-property-name no-decoration-anchor">Nombre inmobiliaria</h3>
                <p class="user-properties-pager-property-sector no-decoration-anchor">Cerro Alto</p>
                <p class="user-properties-pager-property-cost no-decoration-anchor">Precio: <span class="user-properties-pager-property-number-cost">23</span></p>
           


        </div>
        <?php if (($i + 1) % 4 != 0): ?>
        <!--            <img class="user-properties-pager-properties-pager-property-divisor" src="/images/propertysPager/propertysDivisor.png"/>-->
        <?php endif; ?>
    <?php endfor; ?>





</div>