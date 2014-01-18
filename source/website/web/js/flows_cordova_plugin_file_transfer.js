(function($){
	
	var patt = new RegExp(".*web","g");
	var $host = patt.exec(window.location.pathname) + "/data/popup_cordova_plugin_file_transfer.json";
	
	var Flows = new function() {
		
		var contents=$("#contents");
		
		
		var margins={left:170,top:10,right:170,bottom:0,padding:{left:0,right:0}},
			box_w=10,
			step=10;
		
		var canvas={},
			ctx={};
		
		var processing=false;
		
		var datamovin={};
		var vertical=true;
		var colors=new Colors();
		
		var last=null,
			previous=null;
		
		this.init=function(){
			initDOM();
			if(support_canvas()){
				var ua = navigator.userAgent;
				var isiOS = /iPad/i.test(ua) || /iPhone/i.test(ua) || /iPhone OS 3_1_2/i.test(ua) || /iPhone OS 3_2_2/i.test(ua);
				
				step=($.browser.msie||isiOS)?8:4;
				(function getMigration(){
					$.ajax({
						url:$host,
						data:{
							i:isiOS?1:0,
							ie:$.browser.msie && (typeof WebSocket == "undefined")?1:0
						},
						type:'GET',
						dataType: 'json',
						success: function(json) {
							//----------------------------------------------------------------------------------------
							var k = 1;
							var htmltopdev = "";
							var htmltopmod = "";
							var topDev = new Array();
							var topMod = new Array();
							var nbDev = 0;
							var nbMod = 0;
							var totalDevContributions = 0;

							for (var entity in json) {
								if (entity.substring(0,1) == "D") {
									topDev.push( [entity, json[entity]["properties"]["NBC"]] );
								}
								else if (entity.substring(0,1) == "M") {
									topMod.push( [entity, json[entity]["properties"]["NBC"]] );
								}
							}

							topDev = topDev.sort(function(a,b){return b[1]-a[1]});
							topMod = topMod.sort(function(a,b){return b[1]-a[1]});
							for (var key in topDev) {
								if (k==11) {
									htmltopdev += '</ul><ul class="hidden">';
								}
								if (typeof topDev[key][0] != 'undefined') {
									nbDev++;
									totalDevContributions += topMod[key][1];
									htmltopdev += '<li class="p' + k%2 + '">'
									    + '<a class="clickable" href="#t_' + topDev[key][0] + '" id="to_' + topDev[key][0] + '" class="il">'
									    + '<span class="name">' + mapping[topDev[key][0]] + '</span>'
										+ '<span class="val">' + topDev[key][1] + '</span>'
										+ '</a>'
										+ '</li>';
									k++;
								}
							}

							k=1;
							for (var key in topMod) {
								if (k==11) {
									htmltopmod += '</ul><ul class="hidden">';
								}
								if (typeof topMod[key][0] != 'undefined') {
									nbMod++;
									htmltopmod += '<li class="p' + k%2 + '">'
									    + '<a class="clickable" href="#f_' + topMod[key][0] + '" id="from_' + topMod[key][0] + '" class="il">'
									    + '<span class="name">' + mapping[topMod[key][0]] + '</span>'
										+ '<span class="val">' + topMod[key][1] + '</span>'
										+ '</a>'
										+ '</li>';
									k++;
								}
							}

							var projectDetails = '<span>Project: </span><a href="https://github.com/apache/cordova-plugin-contacts">apache/cordova-plugin-contacts</a><br>' 
											   + '<span>Modules: </span><strong>' + nbMod + '</strong><br>'
											   + '<span>Developers: </span><strong>' + nbDev + '</strong><br>'
											   + '<span>Contributions: </span><strong>' + totalDevContributions + '</strong><br>';
							
							$('#topdev').html(htmltopdev);
							$('#topmod').html(htmltopmod);
							$('#projectDetails').html(projectDetails);


							$(".par ul li a").click(function(e){
								e.preventDefault();
								if($("#contents").css("opacity")==1) {
									var entity=this.id.split("_");
									
									if(entity[0]=='from') {
										datamovin.drawOutFlow(entity[1],true);
										showEntityInfo(datamovin.getPointInfo(entity[1],'src'),null,true);
									} else if(entity[0]=='to') {
										datamovin.drawInFlow(entity[1],true);
										showEntityInfo(datamovin.getPointInfo(entity[1],'dst'),null,true);
									} else {
										datamovin.drawFlowFromTo(entity[1],entity[2],true);
										showEntityInfo(datamovin.getPointInfo(entity[1],'src'),entity[2],true);
									}
														
									window.location.hash=this.href.split("#")[1];

								} else {
									$("#contents").click();
								}
								return false;
							});
							//----------------------------------------------------------------------------------------

							flowsJson = new Object();
							for (var dev in json) {
								if (dev.substring(0,1) == "M") {
									var flows = new Object();
									flows["flows"] = json[dev]["properties"]["relations"];
									for (var val in flows["flows"]) {
										flows["flows"][val] = Math.round(flows["flows"][val]/10);
									}
									flowsJson[dev] = flows;
								}
							}
							json = flowsJson;
							

                        	datamovin=new DataMovin();
                        	if(datamovin.init("flows",{flows:json,margins:margins,orientation:'vertical',labels:mapping})) {
                        		
                        		
                        		contents.height(datamovin.getCanvas().height);
                        		
                        		datamovin.drawSources();
                        		datamovin.drawDestinations();
                        		
                        		vertical=datamovin.getOrientation()=='vertical';


								var dm_interactions=new DataMovinInteractions();
								dm_interactions.init(datamovin);
								
								dm_interactions.registerMouseEvents({
									'click':showEntityInfo,
									'mouseover':showEntityName,
									'mouseout':hideEntityName,
									//'document_scrollwheel':hideEntityName,
									'processing':handleProcessing
								});
								
								if (window.location.hash) {
									var connection=window.location.hash.split("_");
									switch(connection[0]){
										case '#f':
											datamovin.drawOutFlow(connection[1],true);
											var goToEntity=datamovin.getPointInfo(connection[1],'src');
											showEntityInfo(goToEntity,null,true);
											Finger.init(false);
										break;
										case '#t':
											datamovin.drawInFlow(connection[1],true);
											var goToEntity=datamovin.getPointInfo(connection[1],'dst');
											showEntityInfo(goToEntity,null,true);
											Finger.init(false);
										break;
										case '#c':
											datamovin.drawFlowFromTo(connection[1],connection[2],true);
											var goToEntity=datamovin.getPointInfo(connection[1],'src');
											showEntityInfo(goToEntity,connection[2],true);
											Finger.init(false);
										break;
										default:
											Finger.init(true);
									}
								} else {
									Finger.init(true);
								}
								
								
							}
							
							
							/*
							var entity_index=0;
							(function drawConnections(){
								if(entity_index<mapping.length) {
									drawFromConnections(mapping[entity_index]);
									entity_index++;
									setTimeout(drawConnections,1000);
								}
							}());
							*/
						}
					});
				})();
			} else {
				$("<div/>").attr("class","alert").html("Unfortunately your browser does not support <span>HTML5</span>.<br/>Please upgrade to a modern browser to fully enjoy <span>people<strong>movin</strong></span>").prependTo("#contents").fadeIn(1000);
			}
		}
		function showEntityName(entity_info){

			if(entity_info && entity_info.type) {
				if(entity_info.type=='src') {
					
					$("#src_title").html(window.mapping[entity_info.name]).show();
					$("#dst_title").hide();
					if(contents.hasClass("ontop")) {
						//console.log($("#src_title"),$("#src_title").outerWidth())
						left=170 - $("#src_title").outerWidth();
					} else {
						left=140+50;
					}

					
					
					position={
						top:(entity_info.y+entity_info.h/2-$("#src_title").height()/2)+"px",
						left:left
					};
					
					last={
						entity:entity_info.name,
						el:"#src_title",
						direction:'src',
						pos:position
					};
					
				} else {
					
					$("#dst_title").html(window.mapping[entity_info.name]).show();
					$("#src_title").hide();
					position={
						top:(entity_info.y+entity_info.h/2-$("#dst_title").height()/2)+"px"
					};
					if(contents.hasClass("ontop")) {
						position.left=170+600;
						position.right='auto';
					} else {
						position.right=140+50;
						position.left="auto";
					}

					last={
						entity:entity_info.name,
						el:"#dst_title",
						direction:'dst',
						pos:position
					};
					
				}
				
				$(last.el).attr("rel",((last.direction=='src')?'from_':'to_')+last.entity).show().css(last.pos).show();
			} else {
				last=null;
				hideEntityName(this);
				
			}
		}
		function hideEntityName(e){
			var relTarget=e.relatedTarget || e.toElement;
			if(!relTarget || (relTarget && relTarget.className && relTarget.className!='ititle'))
				$(".ititle").hide();	
		}
		function handleMouseMove(e){
			var relTarget=e.relatedTarget || e.toElement;
		}
		function showEntityInfo(entity_info,other,animate){
			Finger.remove();
			$(".info").hide();
			if(entity_info==-1){
				window.location.hash="!";
				//contents.show();
				showContents();
				return 0;
			}
			if(entity_info){
				//contents.hide();
				hideContents();
				$(".ititle").hide();
				getEntityInfo(entity_info.name,entity_info.type,entity_info.x,entity_info.y+entity_info.h/2+10,other,animate);
				if(!other) {
					if(entity_info.type=='src') {
						window.location.hash="f_"+entity_info.name;
					} else {
						window.location.hash="t_"+entity_info.name;
					}
				} else {
					var goToEntity=datamovin.getPointInfo(other,'dst');
					getEntityInfo(goToEntity.name,goToEntity.type,goToEntity.x,goToEntity.y+goToEntity.h/2+10,entity_info.name);
					window.location.hash="c_"+entity_info.name+"_"+other;
				}
			} else {
				window.location.hash="!";
			}
		}

		function sortByValue(tab) {
			var keys = []; for(var key in tab) keys.push(key);
			var sortedKeys = keys.sort(function(a,b) { return tab[b]-tab[a] });

			var res = {};
			for (var k = 0; k < sortedKeys.length; ++k) {
				res[sortedKeys[k]] = tab[sortedKeys[k]];
			}
			return res;
		}

		function getEntityInfo(entity,direction,x,y,other,animate) {
			$.ajax({
				url:  $host,
				data: {
					c:   entity,
					src: (direction == 'src' ? 1 : 0),
					o:   (other ? other : '')
				},
				type: 'GET',
				dataType: 'json',
				success: function(data) {

					var html = "";

					if (null != data[entity]["properties"]) {

						if (direction == 'src' ? 1 : 0) {
							rel = "to_";
							reverseRel = "from_";
							contractedRel = "f_";
						} else {
							rel = "from_";
							reverseRel = "to_";
							contractedRel = "t_";
						}

						html = '<h2><a href="#' + contractedRel + entity + '" id="' + reverseRel + entity + '" title="' + mapping[entity] + '">' + mapping[entity] + '</a></h2>'
						+ '<a href="#" class="close" rel="' + rel + entity + '">hide</a>'

						for (var key in items = data[entity]["properties"]) {
							if (key != "relations" && key != "PC") {
								html += '<h3>' + mapping[key] + ': <b>' + items[key] + '</b></h3>';
							} else if (key == "PC") {
								html += '<h3>' + mapping[key] + ': <b>' + items[key]/10 + '</b></h3>';
							}
						}

						if (entity.substring(0,1) == "D") {
							html += '<h5>Top modules (%):</h5>';
						}
						else if (entity.substring(0,1) == "M") {
							html += '<h5>Top developers (%):</h5>';
						}

						html += '<ul>';
						var k = 1;
						for (var key in relations = sortByValue(data[entity]["properties"]["relations"])) {
							html += '<li class="p' + k%2 + '">';

							if (direction == 'src' ? 1 : 0) {
								html += '<a href="#c_' + entity + '_' + key + '" id="' + rel + key + '" class="il">';
							} else {
								html += '<a href="#c_' + key + '_' + entity + '" id="' + rel + key + '" class="il">';
							}

							html += '<span class="name"><b>&bull; </b>' + mapping[key] + '</span>'
								+ '<span class="val">' + (relations[key] / data[entity]["properties"]["NBC"]).toFixed(2) + '</span>'
								+ '</a>'
								+ '</li>';
							k++;
						}
						html += '</ul>';
					}


					var position = {}
					
					if (vertical) {
						if (direction == 'src') {
							left = $("#flows").position().left + margins.left - $("#" + direction + "_info").outerWidth();
						} else {
							left = $("#flows").position().left + x + 20; // + margins.right; // x - $("#" + direction + "_info").outerWidth();
						} 
						position = {
							top:  (y + 80) + "px",
							left: left
						};
					} else {
						position = {
							left: (x - 205) + "px",
							top:  (y + 80 + ((direction == 'src') ? 15 : -340)) + "px"
						};
					}
					//$(".info").hide();
					if (html != "")
						$("#" + direction + "_info").show().html(html).css(position);
					
					
					if (animate) {
						var scrolling = {
							scrollTop: y + "px"
						};
						if (!datamovin.getOrientation() == 'horizontal') {
							scrolling = {
								scrollLeft: x + "px"
							};
						}
						$('html,body').animate(scrolling, 1000);
					}
				}
			});
		}

		function initDOM(){
			
			contents=$("#contents");
			
			$("#dst_info").css("left","745px");//.offset({top:$("#dst_info").offset().top,left:$("#flows").offset().left+canvas.width})
			$(".more").click(function(e){
				e.preventDefault();
				var ul=$(this).parent().parent().find(".hidden");
				if(ul.is(":visible")) {
					ul.fadeOut(1000);
					$(this).html("see more");
				} else {
					$("ul.hidden:visible").hide();
					ul.fadeIn(1000);
					$(this).html("see less");
					$('html,body').animate({
						scrollTop:$(this).offset().top-20
					},1000);
				}
				return false;
			});
			function manageLIClik(li,entity,direction){
				
				var dir=(direction=='to')?'dst':'src',
					data=datamovin.getCurrent()[(direction=='to')?'src':'dst'];

				if(!li.hasClass('sel')) {
					$(".info ul li a.sel").removeClass("sel");
					li.addClass("sel");
					if(direction=='to') {
						datamovin.clean();
						datamovin.drawFlowFromTo(data[0],entity,true);
						window.location.hash="c_"+data[0]+"_"+entity;
					} else {
						datamovin.drawFlowFromTo(entity,data[0],true);
						window.location.hash="c_"+entity+"_"+data[0];
					}
					var info = datamovin.getPointInfo(entity,dir);
					getEntityInfo(entity,dir,info.x,info.y+info.h/2+10,data[0]);
				} else {

					var goToEntity=datamovin.getPointInfo(entity,dir);
					var scrolling={
						scrollTop:goToEntity.y+"px"
					};
					if(!vertical){
						scrolling={
							scrollLeft:goToEntity.x+"px"
						};
					}
					$('html,body').animate(scrolling,1000);
				}
				
			}
			
			$(".info ul li a.il").live("click",function(e){
				e.preventDefault();
				Finger.remove();
				
				var $this=$(this);
				
				var entity=this.id.split("_")
				if(entity[0]=='to'){
					manageLIClik($this,entity[1],entity[0]);
				} else {
					manageLIClik($this,entity[1],entity[0]);
				}
				
				
				return false;
			});
			$(".info h2 a").live("click",function(e){
				e.preventDefault();
				
				$(".info ul li a.sel").removeClass("sel");
				
				var $this=$(this),
					entity=this.id.split("_");
					
				if(entity[0]=='to'){
					datamovin.drawInFlow(entity[1],true);
				} else {
					datamovin.drawOutFlow(entity[1],true);
				}

				window.location.hash=$this.attr("href");
				
				return false;
			});
			$(".info a.close").live("click",function(e){
				e.preventDefault();
				$(".info").hide();
			});
			$(".ititle").live("click",function(e){
				e.preventDefault();
				var $this=$(this);
				
				var entity=$this.attr("rel").split("_");
				if(!$("#"+$this.attr("rel")).is(":visible")){
					if(entity[0]=='to'){
						handleProcessing('start','dst');
						setTimeout(function tm(){
							datamovin.drawInFlow(entity[1],true);
							showEntityInfo(datamovin.getPointInfo(entity[1],'dst'));
							setTimeout(function ttm(){handleProcessing('end','dst');},250);
						},100);
					} else {
						handleProcessing('start','src');
						setTimeout(function tm(){
							datamovin.drawOutFlow(entity[1],true);
							showEntityInfo(datamovin.getPointInfo(entity[1],'src'));
							setTimeout(function ttm(){handleProcessing('end','src');},250);
						},100);
					}
				}
				
				return false;
			});
			
			$(".par ul li a").click(function(e){
				e.preventDefault();
				Finger.remove();
				if($("#contents").css("opacity")==1) {
					var entity=this.id.split("_");
					
					
					if(entity[0]=='from') {
						datamovin.drawOutFlow(entity[1],true);
						showEntityInfo(datamovin.getPointInfo(entity[1],'src'),null,true);
					} else if(entity[0]=='to') {
						datamovin.drawInFlow(entity[1],true);
						showEntityInfo(datamovin.getPointInfo(entity[1],'dst'),null,true);
					} else {
						datamovin.drawFlowFromTo(entity[1],entity[2],true);
						showEntityInfo(datamovin.getPointInfo(entity[1],'src'),entity[2],true);
					}
										
					window.location.hash=this.href.split("#")[1];

				} else {
					$("#contents").click();
				}
				return false;
			});
		}
		function showContents(){
			contents.css({
				"z-index":1010
			}).addClass("ontop");
			$("#wrapper").addClass("ontop");
			
		}
		function hideContents(){
			contents.css({
				"z-index":940
			}).removeClass("ontop");
			$("#wrapper").removeClass("ontop");
		}
		function handleProcessing(status,direction){
			if(status=='start'){
				var title=$("#"+direction+"_title");
				//title.html(title.html()+" <img src=\"img/loading.gif\"/>");
				title.html(title.html());
			}
			if(status=='end'){
			}
		}
	};
	
	Flows.init();
	
}(jQuery));