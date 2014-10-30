<div class="contenidoBasico1">
	<div class="infoclases">
		<div class="formularioEstandar" id="registro-form">
			<div class="container">
				<div class="contentEstandar">
					<form>
						<input type="hidden" name="x1" value="" />
						  <input type="hidden" name="y1" value="" />
						  <input type="hidden" name="x2" value="" />
						  <input type="hidden" name="y2" value="" />
						<p>
							<center>
								<h2>Página en desarrollo</h2>
							</center>
						</p>
						<script>
							function preview(img, selection) {
							    var scaleX = 100 / (selection.width || 1);
							    var scaleY = 100 / (selection.height || 1);
							  
							    $('#photo + div > img').css({
							        width: Math.round(scaleX * 350) + 'px',
							        height: Math.round(scaleY * 290) + 'px',
							        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
							        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
							    });
							}
							// function show() {
							    // if ($('#lightbox-image').is(':visible')) {
							        // $('#lightbox-image').imgAreaSelect({ 
							            // x1: 10, y1: 10, x2: 100, y2: 100, handles: true,
							            // parent: '#jquery-lightbox'
							        // });
							        // $('#jquery-lightbox').unbind('click');
							        // $('#lightbox-nav').remove();
							    // }
							    // else
							        // setTimeout(show, 50);
							// }
// 							
							// $(document).ready(function () {
							    // $('a[rel=lightbox]').lightBox();
							    // $('a[rel=lightbox]').click(show);
							// });
							function parasubmit (img, selection) {
					            $('input[name="x1"]').val(selection.x1);
					            $('input[name="y1"]').val(selection.y1);
					            $('input[name="x2"]').val(selection.x2);
					            $('input[name="y2"]').val(selection.y2);            
					        }
							
							$(document).ready(function () {
								$('<div><img src="<?= base_url() ?>images/icofinder/construccion.jpg" style="position: relative;" /><div>')
							        .css({
							            float: 'right',
							            position: 'relative',
							            overflow: 'hidden',
							            width: '100px',
							            height: '100px'
							        })
							        .insertAfter($('#photo'));
							  $('#photo').imgAreaSelect({ maxWidth: 200, maxHeight: 200, handles: true, 
							  	x1: 0, y1: 0, x2: 100, y2: 100, onSelectChange: preview, onSelectEnd: parasubmit  });
							});
						</script>
						<center><img style="width:350px; height:290px;" id="photo" src="<?= base_url() ?>images/icofinder/construccion.jpg">
						</center>
						  <input type="submit" name="submit" value="Submit" />

					</form>
				</div><!-- content -->
			</div><!-- container -->
		</div>
	</div>
</div>