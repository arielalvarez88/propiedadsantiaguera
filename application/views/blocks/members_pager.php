<div id="agentes-pager">
    <h2 id="agentes-pager-header">Inmobiliarias</h2>

    <?php for ($i = 0; $i < 8; $i++): ?>
        <div class="agentes-pager-agente <?php echo ($i+1) % 4 == 0? 'agentes-pager-agente-last': '';?>">
            <a href="#todavia-no-echo" class="no-decoration-anchor">
                <img class="agentes-pager-agente-photo no-decoration-anchor" src="/images/slide1.jpg"/>
            </a>
            
            <h3 class="agentes-pager-agente-name">Nombre inmobiliaria</h3>
            <p class="agentes-pager-agente-propierties">Propiedades: <span class="agentes-pager-agente-numero-propiedades">23</span></p>

        </div>
        <?php if (($i+1) % 4 != 0): ?>
<!--            <img class="agentes-pager-agente-divisor" src="/images/agentesPager/agentesDivisor.png"/>-->
        <?php endif; ?>
    <?php endfor; ?>


</div>