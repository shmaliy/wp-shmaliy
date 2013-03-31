<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package Hatch
 * @subpackage Template
 */
?>
				<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
				<?php do_atomic( 'close_main' ); // hatch_close_main ?>
		</div><!-- #main -->
		<?php do_atomic( 'after_main' ); // hatch_after_main ?>
		<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>		
		<?php do_atomic( 'before_footer' ); // hatch_before_footer ?>
		<?php do_atomic( 'after_footer' ); // hatch_after_footer ?>
		</div><!-- .wrap -->
		<div id="footer">
			<?php do_atomic( 'open_footer' ); // hatch_open_footer ?>
			<div class="footer-content">
				<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>
				<?php do_atomic( 'footer' ); // hatch_footer ?>
			</div>
			<?php do_atomic( 'close_footer' ); // hatch_close_footer ?>
			<div class="counters">
				<table>
				  	<tr>
				    	<td class="counter">
				
							<!--bigmir)net TOP 100-->
							<script type="text/javascript" language="javascript"><!--
							function BM_Draw(oBM_STAT){
							document.write('<table cellpadding="0" cellspacing="0" border="0" style="display:inline;margin-right:4px;"><tr><td><div style="font-family:Tahoma;font-size:10px;padding:0px;margin:3px 0 0 0;"><div style="width:7px;float:left;background:url(\'http://i.bigmir.net/cnt/samples/default/b52_left.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div><div style="float:left;background:url(\'http://i.bigmir.net/cnt/samples/default/b52_center.gif\');text-align:left;height:17px;padding-top:0px;background-repeat:repeat-x;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a>&nbsp;&nbsp;<span style="color:#797979;">хиты</span>&nbsp;<span style="color:#003596;font:10px Tahoma;">'+oBM_STAT.hits+'</span>&nbsp;<span style="color:#797979;">хосты</span>&nbsp;<span style="color:#003596;font:10px Tahoma;">'+oBM_STAT.hosts+'</span></div><div style="width:7px;float: left;background:url(\'http://i.bigmir.net/cnt/samples/default/b52_right.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div></div></td></tr></table>');
							}
							//-->
							</script>
							<script type="text/javascript" language="javascript"><!--
							bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={o:1,v:16880743,s:16880743,t:0,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
							for(var f=self;f!=f.parent;f=f.parent)bm.w++;
							try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
							else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
							try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
							try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
							r=bmD.referrer.slice(7);if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r).slice(0,400);bm.v^=r.length}
							bm.v^=window.location.href.length;for(var x in bm) if(/^[ovstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
							bmD.write('<sc'+'ript type="text/javascript" language="javascript" src="http://c.bigmir.net/?'+bs.join('&')+'"></sc'+'ript>');
							//-->
							</script>
							<noscript>
							<a href="http://www.bigmir.net/" target="_blank"><img src="http://c.bigmir.net/?v16880743&s16880743&t2" width="88" height="31" alt="bigmir)net TOP 100" title="bigmir)net TOP 100" border="0" /></a>
							</noscript>
							<!--bigmir)net TOP 100-->
				        </td>
				        <td class="counter">
							<!--LiveInternet counter--><script type="text/javascript"><!--
							document.write("<a href='http://www.liveinternet.ru/click' "+
							"target=_blank><img src='//counter.yadro.ru/hit?t25.4;r"+
							escape(document.referrer)+((typeof(screen)=="undefined")?"":
							";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
							screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
							";h"+escape(document.title.substring(0,80))+";"+Math.random()+
							"' alt='' title='LiveInternet: �������� ����� ����������� ��"+
							" �������' "+
							"border='0' width='88' height='15'><\/a>")
							//--></script><!--/LiveInternet-->
				
				        </td>
				        <td class="counter">
				
				            <!-- I.UA counter --><a href="http://www.i.ua/" target="_blank" onclick="this.href='http://i.ua/r.php?41361';" title="Rated by I.UA">
							<script type="text/javascript" language="javascript"><!--
							iS='<img src="http://r.i.ua/s?u41361&p227&n'+Math.random();
							iD=document;if(!iD.cookie)iD.cookie="b=b; path=/";if(iD.cookie)iS+='&c1';
							iS+='&d'+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)
							+"&w"+screen.width+'&h'+screen.height;
							iT=iD.referrer.slice(7);iH=window.location.href.slice(7);
							((iI=iT.indexOf('/'))!=-1)?(iT=iT.substring(0,iI)):(iI=iT.length);
							if(iT!=iH.substring(0,iI))iS+='&f'+escape(iD.referrer.slice(7));
							iS+='&r'+escape(iH);
							iD.write(iS+'" border="0" width="160" height="19" />');
							//--></script></a><!-- End of I.UA counter -->
				
				        </td>
				    </tr>
				</table>
			</div>
			<div class="clear"></div>
		</div><!-- #footer -->
	</div><!-- #container -->
	<?php do_atomic( 'close_body' ); // hatch_close_body ?>
	<?php wp_footer(); // wp_footer ?>
	<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-21706481-1']);
		  _gaq.push(['_trackPageview']);
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script>
</body>
</html>