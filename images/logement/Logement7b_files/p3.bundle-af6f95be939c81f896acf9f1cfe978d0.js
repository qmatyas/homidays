(function e(b,g,d){function c(m,j){if(!g[m]){if(!b[m]){var i=typeof require=="function"&&require;
if(!j&&i){return i(m,!0)
}if(a){return a(m,!0)
}var k=new Error("Cannot find module '"+m+"'");
throw k.code="MODULE_NOT_FOUND",k
}var h=g[m]={exports:{}};
b[m][0].call(h.exports,function(l){var o=b[m][1][l];
return c(o?o:l)
},h,h.exports,e,b,g,d)
}return g[m].exports
}var a=typeof require=="function"&&require;
for(var f=0;
f<d.length;
f++){c(d[f])
}return c
})({1:[function(d,f,b){var a,c={}.hasOwnProperty,g=function(k,i){for(var h in i){if(c.call(i,h)){k[h]=i[h]
}}function j(){this.constructor=k
}j.prototype=i.prototype;
k.prototype=new j();
k.__super__=i.prototype;
return k
};
a=(function(i){g(h,i);
function h(){return h.__super__.constructor.apply(this,arguments)
}h.prototype.template="page3/o2.1/preview_bar";
h.prototype.events={"click .close-window":"closeWindow"};
h.prototype.postInitialize=function(){return this.render()
};
h.prototype.getRenderData=function(){return _.extend(this.model.toJSON(),{editUrl:this.editUrl(),headline:this.headline(),cameFromML:this.cameFromML()})
};
h.prototype.headline=function(){if(this.isListed()){return t("ml.preview.this_is_a_preview_of_your_listing")
}else{return t("ml.preview.your_space_is_unlisted")
}};
h.prototype.editUrl=function(){return"/manage-listing/"+(this.model.get("id"))
};
h.prototype.isListed=function(){return this.model.get("has_availability")
};
h.prototype.cameFromML=function(){return window.location.search.match(/preview/)
};
h.prototype.closeWindow=function(j){if(j!=null){j.preventDefault()
}return window.close()
};
return h
})(AIR.Views.BaseView);
f.exports=a
},{}],2:[function(b,c,a){!function(i){var h=1.5;
function g(m){var l=i(m),n,k;
n=l.clone().css({position:"absolute",visibility:"hidden",height:"auto","z-index":"-1"}).appendTo(l.parent());
k=n.height();
n.remove();
return k
}function f(k){var m=i(document),l=m.find(".expandable");
k=k||{};
l.find(".expandable-content").each(function(){var o=i(this),n;
n=g(o);
if(n<=o.height()*h){o.closest(".expandable").addClass("expanded")
}else{o.closest(".expandable").data("fullHeight",n)
}});
l.find(".expandable-content-full").each(function(){var o=i(this),n=o.closest(".expandable");
n.data("fullHeight",g(o));
o.css("height",n.find(".expandable-content-summary").height())
});
m.on("click",".expandable-trigger-more",function(o){var n=i(this).closest(".expandable");
if(n.hasClass("expanded")){return
}n.addClass("expanded").find(".expandable-content, .expandable-content-full").css("height",n.data("fullHeight")).afterTransition(function(){i(this).css({transition:"none",height:""});
d(i(this));
if(k.callback){k.callback()
}},200);
o.preventDefault()
})
}function d(k){var l=k.closest(".row");
if(l.hasClass("amenities")){j("amenities")
}else{if(l.hasClass("description")){j("description")
}}}function j(k){Airbnb.Tracking.logEvent({event_name:"listing_view",event_data:{operation:"click",page:"p3",section:k,listing_id:AirbnbRooms.hostingId,expanded:true}})
}if(typeof c!=="undefined"){c.exports=f
}else{provide("expandable",f)
}}(window.jQuery)
},{}],3:[function(b,c,a){!function(f){var d=16;
function g(h){this.id=0;
this.$el=h
}g.prototype.start=function(){var h=this;
clearTimeout(this.id);
this.id=setTimeout(function(){h.$el.datepicker("option","loading",true)
},d)
};
g.prototype.stop=function(){var h=this;
clearTimeout(this.id);
this.id=setTimeout(function(){h.$el.datepicker("option","loading",false)
},d)
};
f.AsyncSpinner=g
}(CalendarDateSpan)
},{}],4:[function(b,c,a){CalendarDateSpan.data={};
!function(h){var j=CalendarDateSpan.util;
var i={};
h.getDatesFor=function(p,q,r){g(q,k(p),r||function(){})
};
h.clearCache=function(){i={}
};
function k(q){var p=new Date(j.startOfMonth(q));
p.setMonth(p.getMonth()+2);
return[j.startOfMonth(j.prevDay(q)),j.endOfMonth(q),j.endOfMonth(p)]
}function g(x,u,B){var s=u[0],v=u[1],y=u[2],A=j.startOfMonth(s),w=j.nextMonth(v),q=[],z=[];
while(A<w){var C=j.isoDate(A);
var p=l(i,x,C);
if(p){q=q.concat(p)
}else{z.push(new Date(A))
}A.setMonth(A.getMonth()+1)
}if(z.length===0){B(null,n(q));
return
}var r=_.first(z);
d(x,r,y,function(D,E){if(D){B(D);
return
}o(i,x,E);
B(null,n(q.concat(E)))
})
}function n(p){var q=_.uniq(p,function(r){return r.date
});
return _.sortBy(q,function(r){return r.date
})
}function l(p,r,q){p[r]=p[r]||{};
return p[r][q]
}function f(p,s,q,r){p[s]=p[s]||{};
p[s][q]=r||[]
}function o(p,u,s){var q=[],r=null;
_.each(s,function(v){var x=v.date.split("-"),w=x[0]+"-"+x[1];
if(w!==r){if(r){f(p,u,r+"-01",q);
q=[]
}r=w
}q.push(v)
});
if(r){f(p,u,r+"-01",q)
}}function d(r,p,q,s){$.ajax({type:"GET",url:m(r,p,q),success:function(u){s(null,u.calendar.dates)
},error:function(){s("Could not fetch calendar data")
}})
}function m(u,p,s){var r=["/v1","listings",u,"calendar"].join("/");
var q=["?start_date=",j.isoDate(p),"&end_date=",j.isoDate(s)].join("");
return Airbnb.Api.getUrl(r+q)
}}(CalendarDateSpan.data)
},{}],5:[function(b,c,a){!function(i,y,k,u,v){var s=CalendarDateSpan.AsyncSpinner,h=CalendarDateSpan.TooltipManager,d=CalendarDateSpan.util,z=CalendarDateSpan.data;
var m=["busy-date"];
i.fn.calendarDateSpan=function(O,B,M){if(O==="option"){return j.call(this,B,M)
}var D,I=null,K=i(this),H=O.checkin||".checkin",F=O.checkout||".checkout",G=K.find(H),A=K.find(F),J=O.listingId,E=O.minNights,C=d.cleanDate(new Date()),N=[];
K.data("cds-checkin",G);
K.data("cds-checkout",A);
if(O.lastUpdated){I=d.fromIsoDate(O.lastUpdated)
}N.push(v.t("datepicker_min_nights",{smart_count:E}));
N.push(CalendarDateSpan.lastUpdated(C,I));
D=K.airbnbInputDateSpan(y.extend({},O,{defaults:y.extend(O.defaults||{},{showButtonPanel:true,additionalInfo:N.join("<br>")})}));
p(G,J);
f(A,J);
return D
};
function j(C,E){var D=i(this),A=D.data("cds-checkin"),B=D.data("cds-checkout");
A.datepicker("option",C,E);
B.datepicker("option",C,E);
if(C==="fixed"){l(A,E);
l(B,E)
}}function l(A,C){var B=A.data("tooltip-manager");
if(!B){return
}if(C){B.fix()
}else{B.unfix()
}}i.calendarDateSpan={reset:function(){z.clearCache()
}};
function p(A,B){n(A,B,x(A))
}function f(A,B){n(A,B,o(A))
}function n(B,E,C){var A=0,D=new s(B);
g(B,"beforeShow",function(){var F=d.startOfMonth(i.datepicker.parseDate(B.val())),G=++A;
D.start();
z.getDatesFor(F,E,function(H,I){if(A===G){D.stop();
C(H,I)
}})
});
g(B,"onChangeMonthYear",function(G,H){var F=d.startOfMonth(new Date()),I=++A;
F.setYear(G);
F.setMonth(H-1);
D.start();
z.getDatesFor(F,E,function(J,K){if(A===I){D.stop();
C(J,K)
}})
});
if(!k.touch){r(B,E)
}}function r(B,D){var A=0,C=new h();
B.data("tooltip-manager",C);
g(B,"onDateMouseEnter",function(E,G){var F=++A;
z.getDatesFor(d.startOfMonth(E),D,function(M,N){if(M||F!==A){return
}var K,I,H,J=d.isoDate(E);
I=y.find(N,function(O){return O.date===J
});
if(I.price_local&&I.local_currency){H=v.priceString(I.price_local,I.local_currency);
K=C.add(J,H,G);
K.appendTo(i("body"))
}})
});
g(B,"onDateMouseLeave",function(E){A++;
C.clear()
});
g(B,"onClose",function(){A++;
C.clear()
})
}function x(A){return function(B,C){if(B){return
}w(A,C)
}
}function o(A){return function(B,C){if(B){return
}w(A,q(C))
}
}function g(C,A,D){var B=C.datepicker("option",A);
C.datepicker("option",A,function(){if(typeof B==="function"){B.apply(this,arguments)
}D.apply(this,arguments)
})
}function q(A){var B=false;
return y.map(A,function(C){var D=y.clone(C);
if(D.available){B=true
}else{if(B){D.available=true;
B=false
}}return D
})
}function w(B,C){var D={},A={};
y.each(C,function(E){if(!E.available){D[E.date]=m;
A[E.date]=true
}});
B.datepicker("option","dateClasses",D);
B.datepicker("option","blockedDates",A)
}}(jQuery,_,Modernizr,Airbnb,I18n)
},{}],6:[function(b,c,a){window.CalendarDateSpan={}
},{}],7:[function(b,c,a){!function(f,d){CalendarDateSpan.lastUpdated=function(l,k){if(!k){return I18n.t("datepicker_never_updated")
}var g=f(l),h=g.diff(k,"days"),i=g.diff(k,"months"),j=g.diff(k,"years");
if(j>0){return I18n.t("datepicker_updated_years_ago",{smart_count:j})
}if(i>0){return I18n.t("datepicker_updated_months_ago",{smart_count:i})
}if(h>0){return I18n.t("datepicker_updated_days_ago",{smart_count:h})
}return I18n.t("datepicker_updated_today")
}
}(moment,CalendarDateSpan)
},{}],8:[function(b,c,a){window.Modernizr=function(Y,X,W){function E(d){Q.cssText=d
}function D(f,d){return E(prefixes.join(f+";")+(d||""))
}function C(f,d){return typeof f===d
}function B(f,d){return !!~(""+f).indexOf(d)
}function A(h,g,k){for(var j in h){var i=g[h[j]];
if(i!==W){return k===!1?h[j]:C(i,"function")?i.bind(k||g):i
}}return !1
}var V="2.8.3",U={},T=X.documentElement,S="modernizr",R=X.createElement(S),Q=R.style,P,O={}.toString,N={},M={},K={},J=[],I=J.slice,H,G={}.hasOwnProperty,F;
!C(G,"undefined")&&!C(G.call,"undefined")?F=function(f,d){return G.call(f,d)
}:F=function(f,d){return d in f&&C(f.constructor.prototype[d],"undefined")
},Function.prototype.bind||(Function.prototype.bind=function(f){var i=this;
if(typeof i!="function"){throw new TypeError
}var h=I.call(arguments,1),g=function(){if(this instanceof g){var d=function(){};
d.prototype=i.prototype;
var k=new d,j=i.apply(k,h.concat(I.call(arguments)));
return Object(j)===j?j:k
}return i.apply(f,h.concat(I.call(arguments)))
};
return g
});
for(var z in N){F(N,z)&&(H=z.toLowerCase(),U[H]=N[z](),J.push((U[H]?"":"no-")+H))
}return U.addTest=function(g,f){if(typeof g=="object"){for(var h in g){F(g,h)&&U.addTest(h,g[h])
}}else{g=g.toLowerCase();
if(U[g]!==W){return U
}f=typeof f=="function"?f():f,typeof enableClasses!="undefined"&&enableClasses&&(T.className+=" "+(f?"":"no-")+g),U[g]=f
}return U
},E(""),R=P=null,U._version=V,U
}(window,window.document)
},{}],9:[function(b,c,a){!function(d){var g=CalendarDateSpan.Tooltip;
var f=0;
function h(){this.tooltips={};
this.fixed=false;
this.id=f++
}h.prototype.add=function(j,l,i){var k=new g(i,l,this.id);
this.tooltips[j]=k;
if(this.fixed){k.fix()
}return k
};
h.prototype.remove=function(i){var j=this.tooltips[i];
delete this.tooltips[i];
j.remove();
return j
};
h.prototype.fix=function(){this.fixed=true;
_.each(this.tooltips,function(i){i.fix()
})
};
h.prototype.unfix=function(){this.fixed=false;
_.each(this.tooltips,function(i){i.unfix()
})
};
h.prototype.clear=function(){for(var i in this.tooltips){if(this.tooltips.hasOwnProperty(i)){this.remove(i)
}}$(".datepicker-tooltip-"+this.id).remove()
};
d.TooltipManager=h
}(CalendarDateSpan)
},{}],10:[function(b,c,a){!function(f){var i=b("o2"),h=Handlebars.compile(['<div class="tooltip {{position}} datepicker-tooltip datepicker-tooltip-{{managerId}}" aria-hidden="false">','<p class="panel-body">{{{text}}}</p>',"</div>"].join(""));
function g(j,k,l){this.$target=j;
this.removed=false;
this.$el=$(h({position:"tooltip-bottom-middle",text:k,managerId:l}))
}g.prototype.appendTo=function(j){if(this.removed){return
}j.append(this.$el);
d(this)
};
g.prototype.fix=function(){if(!this._fixed){this._fixed=true;
d(this)
}};
g.prototype.unfix=function(){if(this._fixed){this._fixed=false;
d(this)
}};
g.prototype.remove=function(){this.removed=true;
this.$el.remove()
};
function d(m){var k=m.$target,l=m.$el,o=k.offset(),j="absolute",n=o.top-(l.height()+11);
m.fix();
if(m._fixed){n-=$(window).scrollTop();
j="fixed"
}l.css({position:j,top:n,left:o.left-(l.outerWidth()/2)+(k.width()/2)})
}f.Tooltip=g
}(CalendarDateSpan)
},{o2:"o2"}],11:[function(b,c,a){CalendarDateSpan.util={};
!function(d){d.isoDate=function(f){return $.datepicker.formatDate("yy-mm-dd",f)
};
d.fromIsoDate=function(f){return $.datepicker.parseDate("yy-mm-dd",f)
};
d.cleanDate=function(f){return d.fromIsoDate(d.isoDate(f))
};
d.startOfMonth=function(f){var g=d.cleanDate(f);
g.setDate(1);
return g
};
d.endOfMonth=function(f){var g=d.startOfMonth(f);
g.setMonth(g.getMonth()+1);
return d.prevDay(g)
};
d.nextMonth=function(f){var g=d.startOfMonth(f);
g.setMonth(g.getMonth()+1);
g.setDate(1);
return g
};
d.prevDay=function(f){var g=d.cleanDate(f);
g.setDate(g.getDate()-1);
return g
}
}(CalendarDateSpan.util)
},{}],12:[function(c,d,a){var g=c("backbone"),b="/locations/api/neighborhood_tiles.json?",f=g.Model.extend({parse:function(h){return this.id?h[this.id]:h
},url:function(){var h=b;
return[h,"ids[]=",this.id].join("")
},hasThumbnails:function(){return this.get("thumbnails")&&this.get("thumbnails").length>0
}});
d.exports=f
},{backbone:"backbone"}],13:[function(c,d,b){c("./lib/calendar-date-span/modernizr-touch");
c("./lib/calendar-date-span/index");
c("./lib/calendar-date-span/util");
c("./lib/calendar-date-span/last-updated");
c("./lib/calendar-date-span/async-spinner");
c("./lib/calendar-date-span/tooltip");
c("./lib/calendar-date-span/tooltip-manager");
c("./lib/calendar-date-span/data");
c("./lib/calendar-date-span/date-span");
c("./views/shared/user_flag");
c("./views/shared/social/social_share_widget");
c("./vendor/infobox_packed");
c("./vendor/embedly");
var a=BootstrapData.get("room_options");
window.P3={Room:c("./p3/room"),Utils:c("./p3/utils")};
window.AirbnbRooms=c("./p3/legacy_room");
window.AirbnbRooms.init(a);
window.roomObj=new window.P3.Room(a)
},{"./lib/calendar-date-span/async-spinner":3,"./lib/calendar-date-span/data":4,"./lib/calendar-date-span/date-span":5,"./lib/calendar-date-span/index":6,"./lib/calendar-date-span/last-updated":7,"./lib/calendar-date-span/modernizr-touch":8,"./lib/calendar-date-span/tooltip":10,"./lib/calendar-date-span/tooltip-manager":9,"./lib/calendar-date-span/util":11,"./p3/legacy_room":17,"./p3/room":18,"./p3/utils":23,"./vendor/embedly":36,"./vendor/infobox_packed":37,"./views/shared/social/social_share_widget":41,"./views/shared/user_flag":42}],14:[function(b,c,a){function d(i){if(!Airbnb.Utils.isAdmin()){return
}var h=$('<div id="admin-placeholder"></div>'),g=false;
$("#room").after(h);
$(document).one("keypress",function(j){if(j.target.type==="textarea"||j.target.type==="password"||j.target.type==="text"){return
}if(g){return
}switch(j.which){case 49:case 50:case 51:$("body").animate({scrollTop:$("#admin-placeholder").offset().top});
break
}});
var f=function(){$.get("/rooms/ajax_admin_footer",{hosting_id:i},function(k,j){if(j==="success"){h.fadeOut(200,function(){h.replaceWith(k.footer);
$("#admin_area").hide().slideToggle(500);
g=true
})
}})
};
window._.defer(f)
}c.exports={init:d}
},{}],15:[function(d,b,f){var a,h,j,c,g,i=d("underscore");
g={init:function(){this.hasPushState=(typeof window.history.pushState==="function");
if(this.hasPushState){window.addEventListener("popstate",function(k){if(k.state){window.location=window.location
}});
window.history.replaceState({},null,window.location)
}Airbnb.Mediator.on("p3::updateSubtotal",this.refresh.bind(this));
return this.refresh
},refresh:function(r){var l=$("#subtotal_area"),s=$("#checkin").val(),m=$("#checkout").val(),q=$("#number_of_guests").val(),o=$.query.load(window.location.href).keys,n={},k;
if(a===s&&h===m&&j===q){if(!r){return
}if(c){window.setTimeout(function(){r(null,c)
},0)
}else{r("no data")
}return
}a=s;
h=m;
j=q;
function p(u){Airbnb.Mediator.trigger("p3::refreshSubtotal",u);
AirbnbRooms.updateAirEvent({avg_price:u.price_per_night_usd,native_avg_price:u.price_per_night_native,total_price:u.total_price_usd,native_total_price:u.total_price_native,service_fee:u.service_fee_usd,include_service_fee:u.include_service_fee,tax_amount:u.tax_amount,tax_descriptions:u.tax_descriptions,available:u.available,instant_book_possible:u.can_instant_book,instant_book_reasons:u.instant_book_reasons,instant_book_experiments:u.instant_book_experiments,currency:u.currency,checkin_date:$.datepicker.formatDate("yy-mm-dd",$.datepicker.parseDate(s)),checkout_date:$.datepicker.formatDate("yy-mm-dd",$.datepicker.parseDate(m)),nights:u.nights,guests:q,});
AirbnbRooms.sendAirEvent();
i.extend(AirbnbRooms.ibData,{is_instant_bookable:u.can_instant_book,instant_book_reasons:u.instant_book_reasons,instant_book_experiments:u.instant_book_experiments});
$("#view_other_listings_button").data("reasonCode",u.unavailable_reason_code);
c=u;
if(r){r(null,u)
}}if(s&&m){n.checkin=s;
n.checkout=m
}if(q&&q!=="1"){n.guests=q
}k=window.location.pathname;
if(!$.isEmptyObject(n)){k+="?"+$.param(n)
}if(o.guests!==n.guests||o.checkin!==n.checkin||o.checkout!==n.checkout){if(g.hasPushState){window.history.pushState({},null,k)
}}Airbnb.Mediator.trigger("p3::dateGuestChange",n);
if(s&&m){$("#book_it_button").removeAttr("disabled");
$("#book_it_status").addClass("loading");
$.getJSON("/rooms/ajax_refresh_subtotal",$("#book_it_form").serialize(),p)
}else{Airbnb.Mediator.trigger("p3::refreshSubtotal")
}}};
b.exports=g
},{underscore:"underscore"}],16:[function(b,c,a){(function(f,j,d){var i,h,g;
if(typeof c!=="undefined"){i=b("../../simple_iterator")
}else{i=enderRequire("simple_iterator")
}h=function(k,l,m){this._viewport=k;
this._panel=l;
this._panelWidth=this._panel.children().length*m.thumbnailWidth;
this._options=f.extend({},this._options,m)
};
f.extend(h.prototype,{_viewport:null,_panel:null,_currentLeft:0,_options:{extraSpacing:{left:0,right:0}},showInViewport:function(p){var k=p.position(),q=this._options.thumbnailWidth||p.width(),m=this._viewport.width(),o=k.left+(q-m)/2+10,l=0,n=this._panelWidth-m;
if(m>=this._panelWidth){return
}if(o>=0&&o<=n){this._currentLeft=o
}else{if(o<0){this._currentLeft=0
}else{this._currentLeft=n
}}this._panel.css("left",-this._currentLeft)
}});
g=function(q,s){var l,n,p,m,o,k,r=this;
this._options=f.extend({},this._options,s);
this._$slideshow=q;
this._$thumbnails=q.find(".slideshow-thumbnails");
l=q.find(".slideshow-images");
n=q.find(".slideshow-caption");
p=q.find(".slideshow-preload");
m=JST[this._options.template];
o=JST[this._options.preloadTemplate];
this._slidingPanel=new h(q.find(".thumbnails-viewport"),q.find(".thumbnails-slide-panel"),{thumbnailWidth:this._options.thumbnailWidth});
k=j.makeArray(this._$thumbnails.find("li a").map(function(u){var v=j(this);
return{url:v.attr("href"),caption:v.attr("title"),index:u}
}));
this._list=new i(k,{onChange:function(y,A,B){var C=l.find(".active"),w=r._$thumbnails.find(".active"),D,x=r._$slideshow.data("preload-size")||1,z,v,u=[];
l.find("li:not(.active)").html(m(f.extend({},y,r._options.size))).addClass("active").insertBefore(C);
C.removeClass("active");
w.removeClass("active");
D=r._$thumbnails.find("li").eq(A);
D.find("a").addClass("active");
r._slidingPanel.showInViewport(D);
n.toggleClass("hidden",!y.caption).text(y.caption||"");
if(p.length&&o){for(z=0;
z<x;
++z){v=(A+z+1)%k.length;
if(!j("#slideshow-preload-"+v).length){u.push(this.peek(v))
}}if(u.length){p.append(o({images:u}))
}}if(r._options.onChange){r._options.onChange(y,A,B)
}}});
this.toIndex(0);
this._attachClickHandlers();
this._attachKeyboardHandlers()
};
f.extend(g.prototype,{_$slideshow:null,_$thumbnails:null,_list:null,_slidingPanel:null,_options:{size:{},template:"page3/o2.1/slideshow_image",preloadTemplate:"page3/o2.1/slideshow_image_preload"},_attachClickHandlers:function(){var k=this;
this._$thumbnails.on("click","li a",function(m){m.preventDefault();
var l=k._$thumbnails.find("li").index(j(this).parent());
k.toIndex(l,this)
});
this._$slideshow.on("click","[data-slideshow-prev]",function(l){l.preventDefault();
k.previous(this)
});
this._$slideshow.on("click","[data-slideshow-next]",function(l){l.preventDefault();
k.next(this)
})
},_attachTouchHandlers:function(){},_attachKeyboardHandlers:function(){var l=this,k=function(m){switch(m.which){case 37:l.previous("keyboardLeft");
break;
case 39:l.next("keyboardRight");
break
}};
j(document).on("keydown",k)
},next:function(k){this._list.next(k)
},previous:function(k){this._list.previous(k)
},toIndex:function(k,l){this._list.toIndex(k,l)
}});
if(typeof c!=="undefined"){c.exports=g
}else{provide("slideshow",g)
}}(_,jQuery,window))
},{"../../simple_iterator":35}],17:[function(c,d,a){var b=c("underscore");
var f={staggered:false,hostingLengthType:0,_initialized:false,_initHooks:[],addInitHook:function(g){if(this._initialized){setTimeout(g,0)
}else{this._initHooks.push(g)
}},init:function(l){var g=c("./admin"),k=$.query.load(window.location.href).keys,n=$("#room").data("contactHostSignupModalOrderLaunched");
this.$book_it_form=$("#book_it_form");
g.init(l.hostingId);
this.options=l=l||{};
this.airEventData=l.airEventData||{};
f.hostingId=l.hostingId;
f.staggered=l.staggered;
Airbnb.Mediator.on("p3::contactHostLogging",f.contactHostLogging);
var j=[];
$("#reviews").find(".review-text").each(function(p,o){j.push($(o).data("review-id"))
});
$.getJSON("/rooms/"+l.hostingId+"/personalization.json",{review_ids:j},function(o){$.extend(o,k);
b.extend(this.ibData,{is_instant_bookable:o.is_instant_bookable,instant_book_reasons:o.instant_book_reasons,instant_book_experiments:o.instant_book_experiments});
this.setInstantBookable(o.is_instant_bookable&&(!o.checkin||!o.checkout));
if(!o.checkin||!o.checkout){f.sendAirEvent()
}if(o.should_show_review_translations){$("#review-translate-button-wrapper").removeClass("hide").addClass("show")
}else{$("#review-translate-button-wrapper").removeClass("show").addClass("hide")
}enderRequire("o2-flash").display();
Airbnb.Mediator.trigger("p3::personalize",o);
if(window.roomObj){window.roomObj.trigger("personalize",o)
}}.bind(this));
this.initWLButton();
function i(){if(window.FB&&FB.Event&&FB.Event.subscribe){FB.Event.subscribe("edge.create",function(o){ga("send","social","Facebook","Like",o)
});
FB.Event.subscribe("edge.remove",function(o){ga("send","social","Facebook","Unlike",o)
})
}}if(window.FB){i()
}else{Airbnb.Mediator.on("fbInit",i)
}var m=[[".photos > a","p3_photos_click"],[".maps > a","p3_maps_click"],[".calendar > a","p3_calendar_click"],["#description_link","p3_description_click"],["#amenity_link","p3_amenity_click"],["#house_rules_link","p3_house_rules_click"]];
m.map(function(o){$(o[0]).on("click",function(){Airbnb.Tracking.logEvent({event_name:o[1],event_data:{action:"click",hosting_id:AirbnbRooms.hostingId}})
})
});
$("#host-profile-contact-btn, #contact-host-link").on("click",function(p){var o=$(this).is("#contact-host-link")?"CONTACT_HOST_LINK":"CONTACT_HOST";
if(!Airbnb.Utils.isUserLoggedIn){Airbnb.ERF.deliverExperiment("p3_contact_host_signup_modal_order",{control:function(){f.experimentAssignment={signup_order:"control"};
f.contactHostLogging({section:o,step:"clicked_contact",action:"click"});
f.contactHostHandler(o,p)
},signup_login_first:function(){f.experimentAssignment={signup_order:"signup_login_first"};
f.contactHostLogging({section:o,step:"clicked_contact",action:"click"});
Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"signup_login_modal",step:"signup_login_launched",action:"impression"});
Airbnb.SignupLoginModal.launchSignup({callback:function(){f.contactHostLogging({section:"signup_login_modal",step:"logged_in",action:"submit"});
f.contactHostHandler(o,p)
},flow:"contact-host"})
},treatment_unknown:function(){f.contactHostHandler(o,p)
}})
}else{f.contactHostHandler(o,p)
}});
this.$book_it_form.on("submit",f.proxy(f.bookItFormSubmitHandler));
if(document.location.hash){$("a[href='"+encodeURIComponent(document.location.hash)+"']").parent().click()
}var h=c("../lib/airbnb/expandable");
$("#reviews").on("click",".pagination a",function(){var o=$(this),p=$(".review-content");
p.addClass("loading");
$.ajax({url:o.attr("href"),success:function(q){p.removeClass("loading");
o.closest(".review-content").html(q).find("img.lazy").lazyload();
$("html, body").animate({scrollTop:p.offset().top-40},"fast");
h()
}});
return false
});
f.initOpenGraphWishlist();
f.initTranslateButton(l.locale);
f.initReviewTranslateButton(l.locale);
while(this._initHooks.length>0){this._initHooks.pop()()
}this._initialized=true
},initWLButton:function(){Airbnb.WishListButton.init({placement:"page3",tooltipOptions:{showLimit:2}})
},isInstantBookable:function(){return this._instantBookable
},setInstantBookable:function(g){this._instantBookable=g;
if(g){AirbnbRooms.showInstantBookButton()
}else{AirbnbRooms.showBookItButton()
}},initOpenGraphWishlist:function(){Airbnb.OpenGraph.init(Airbnb.OpenGraph.sendWishlistToFacebook,AirbnbRooms.hostingId);
if(Airbnb.userAttributes.og_publish){Airbnb.Mediator.on("fbLoginStatus",Airbnb.Utils.fbInitHasPublishAction)
}},initTranslateButton:function(h){var k=$("#new_translate_button_wrapper");
if(k){var j=$("#description_text_wrapper"),g=k.find(".translate_button_label"),i=k.find(".gBrandingText"),m=j.html(),l=false;
k.click(function(){if(l){l=false;
g.html(I18n.t("translate_this_description"));
i.removeClass("translated");
j.html(m);
$("#disclaimer_text").html("")
}else{l=true;
window.P3.Utils.translate(h)
}})
}},initReviewTranslateButton:function(h){var k=$("#review-translate-button-wrapper"),j=$("#review-translate-button");
if(k){var g=k.find(".review_translate_button_label"),i=k.find(".gBrandingText");
g.html(I18n.t("translate_reviews"));
$(document).on("click","#review-translate-button",function(){if($("#review-translate-button-wrapper").data("is-translated")){$("#review-translate-button-wrapper").data("is-translated",false);
g.html(I18n.t("translate_reviews"));
i.removeClass("translated");
$(".review-text").each(function(m,o){var n=$(o);
n.html(n.data("original-text"))
});
$(".review-translation-language").each(function(m,o){var n=$(o);
n.html("")
});
$(".review-response-text").each(function(m,o){var n=$(o);
n.html(n.data("original-text"))
});
$(".review-response-language").each(function(m,o){var n=$(o);
n.html("")
})
}else{$("#review-translate-button-wrapper").data("is-translated",true);
var l=[];
$(".review-text").each(function(m,n){l.push($(n).data("review-id"))
});
window.P3.Utils.translate_reviews(h,l)
}})
}},proxy:function(g){return function(h){return g.call(f,this,h)
}
},contactHostHandler:function(h,g){f.loadContactHostModal();
Airbnb.Tracking.logEvent(f.getP3ClickEventData(h));
if(g){g.preventDefault()
}},contactHostLogging:function(h){var g=f.getP3ContactHostEventData(h.section,h.action);
if(f.experimentAssignment){$.extend(g.event_data,f.experimentAssignment)
}if(h.step){$.extend(g.event_data,{step:h.step})
}Airbnb.Tracking.logEvent(g)
},bookItFormSubmitHandler:function(i,k){var h=$(i),j=h.find("button"),g;
if(!window.P3.Utils.check_inputs()){k.preventDefault()
}else{j.attr("disabled","disabled");
j.css("cursor","progress");
$("#instant_book_arrow").addClass("gray_arrow");
g=f.getP3ClickEventData(f.isInstantBookable()?"INSTANT_BOOK":"BOOK_IT");
Airbnb.Tracking.queueEvent(g)
}},loadContactHostModal:function(){var h;
var i=this;
var g;
Airbnb.ERF.deliverExperiment("p3_new_contact_modal",{control:function(){g=i.options.ajaxLwlbContact
},treatment:function(){g=i.options.ajaxLwlbContactV2
},treatment_unknown:function(){g=i.options.ajaxLwlbContact
},not_in_experiment:function(){g=i.options.ajaxLwlbContact
}});
if(!this.contactHostFlow){h=c("./shared/contact-host-flow");
this.contactHostFlow=new h({url:g,listing:window.roomObj.options,el:$("#contact-modal")})
}this.contactHostFlow.open()
},showInstantBookButton:function(){this.$book_it_form.addClass("instant-book")
},showBookItButton:function(){this.$book_it_form.removeClass("instant-book")
},sendAirEvent:function(){if(this.airEventData.status){this.airEventData.status="update";
this.airEventData.operation="update"
}else{this.airEventData.status="initial";
this.airEventData.operation="impression"
}Airbnb.Tracking.logEvent({event_name:"listing_view",event_data:this.airEventData})
},updateAirEvent:function(g){$.extend(this.airEventData,g)
},getP3ClickEventData:function(g){return{event_name:"P3",event_data:{page:"LISTING_PAGE",section:g,action:"CLICK",listing_id:f.hostingId,is_instant_bookable:f.ibData.is_instant_bookable,instant_book_reasons:f.ibData.instant_book_reasons,instant_book_experiments:f.ibData.instant_book_experiments}}
},getP3ContactHostEventData:function(h,g){return{event_name:"booking_flow",event_data:{page:"p3",section:h,action:g,listing_id:f.hostingId,is_instant_bookable:f.ibData.is_instant_bookable,instant_book_reasons:f.ibData.instant_book_reasons,instant_book_experiments:f.ibData.instant_book_experiments}}
},submitBookItForm:function(){this.$book_it_form.submit()
},ibData:{}};
d.exports=f
},{"../lib/airbnb/expandable":2,"./admin":14,"./shared/contact-host-flow":19,underscore:"underscore"}],18:[function(g,d,i){var n=g("underscore"),m=g("backbone"),h=g("./views/photos"),l=g("./views/similar_listings"),p=g("./views/book_it"),o=g("./views/location"),b=g("./views/details"),j=g("./views/host_profile"),f=g("../apps/manage_listing/views/preview_bar"),a=g("../lib/airbnb/expandable"),c=g("../views/shared/social/social_share_widget");
function k(q){function s(u){u.preventDefault();
Airbnb.Mediator.trigger("p3::viewCalendar")
}function r(){try{var v=[],x=Airbnb.Utils.selectJavascriptResources(),B=Airbnb.Utils.selectCSSResources();
var w=Airbnb.Utils.computeAggregatesForResources(/.*muscache.com\/.*pictures.*_original.jpg/);
var u=Airbnb.Utils.computeAggregatesPayload(w,"listing_image_stats","listing_image_failure");
var y=Airbnb.Utils.computeAggregatesForResources(/.*muscache.com\/.*pictures.*small.jpg/);
var A=Airbnb.Utils.computeAggregatesPayload(w,"small_image_stats","small_image_failure");
v=v.concat(x,B,u,A);
if(v.length>0){Airbnb.Tracking.logEvent({event_name:"resource_timing",event_data:{page:"p3",payload:v}})
}}catch(z){}}this.initialize=function(u){n.extend(this,m.Events);
if(window.navigator.userAgent.indexOf("iPad")>=0){$(".webkit-render-fix").removeClass("webkit-render-fix")
}this.options=u;
this.photosView=new h({el:$("#photos"),photoData:u.photoData});
this.bookItView=new p({el:$("#book_it_form"),hostingId:u.hostingId,minNights:u.minNights,calendarLastUpdated:u.calendarLastUpdated,nightly_price:u.nightly_price,staggered_price:u.staggered_price,isMonthly:u.isMonthly,pfPicUploaderJSPath:u.pfPicUploaderJSPath});
this.similarListingsView=new l({el:$("#similar-listings"),hostingId:u.hostingId});
this.locationView=new o({el:$("#neighborhood")});
this.detailsView=new b({el:$("#details")});
this.hostProfileView=new j({el:$("#host-profile")});
$("#view-calendar").on("click",s);
$("#view_other_listings_button").on("click",window.P3.Utils.viewOtherListings);
Airbnb.Mediator.on("p3::personalize",this.doPersonalization.bind(this));
a({callback:function(){Airbnb.Mediator.trigger("p3::updateStickyCalculations")
}});
this.initLazyLoadSections();
$(window).on("load",function(){$("img.lazy").lazyload()
});
Airbnb.WishListButton.init({placement:"p3"});
new c({el:$(".social-share-widget"),page:"P3"});
Airbnb.ERF.deliverExperiment("validation_test_v2",{baseline:function(){},treatment:function(){},treatment_unknown:function(){}});
$(window).on("load",r)
};
this.doPersonalization=function(x){var u,v,w;
if(x.is_owned_by_user){$(".superhost-tooltip-other, .superhost-tooltip-self").toggleClass("hide");
$(".response-details").toggleClass("hide")
}else{if(Airbnb.Utils.isUserLoggedIn){var y=$("#flag-modal-container");
new UserFlag(x.flag_info,y)
}}if(x.listing_attributes){$("#list-your-space").hide();
I18n.extend(x.preview_bar_phrases);
u=x.listing_attributes.listing;
v=new m.Model(u);
w=new f({model:v});
w.$el.insertAfter("#header");
$("#edit-summary").removeClass("hide");
Airbnb.Mediator.trigger("p3::updateStickyCalculations")
}this.initPreviouslyMessaged(x.interaction)
};
this.initPreviouslyMessaged=function(u){var v;
if(u){u.message=u.replied_last?t("interactionContacted",{date:u.date}):t("interactionReceived",{date:u.date});
u.viewMessage=I18n.t("interactionViewMessage");
u.completeBooking=I18n.t("completeBooking");
u.hasOffer=!!u.offer_url;
v=$(JST["page3/o2.1/interaction"](u));
$("#details-column").prepend(v);
if(u.hasOffer){$("#book_it_button").removeClass("btn-primary")
}v.slideDown()
}};
this.initLazyLoadSections=function(){var u=$("#details"),v=u.position().top+u.height()/2,w;
w=n.debounce(function(){if($(window).scrollTop()>=v){Airbnb.Mediator.trigger("p3::lazyLoadSections");
$(window).off("scroll",w)
}},200,false);
$(window).on("scroll load",w)
};
this.initialize(q)
}d.exports=k
},{"../apps/manage_listing/views/preview_bar":1,"../lib/airbnb/expandable":2,"../views/shared/social/social_share_widget":41,"./views/book_it":24,"./views/details":27,"./views/host_profile":28,"./views/location":29,"./views/photos":31,"./views/similar_listings":32,backbone:"backbone",underscore:"underscore"}],19:[function(j,b,B){var r=j("o2"),c=r.Tabs,a=r.Modal,A=j("../utils"),w=j("./question_saver"),n=j("./p3_upsell");
j("../../verification_flow.js");
function z(C){this.url=C.url;
this.listing=C.listing;
this.$el=C.el;
this.$content=this.$el.find(".modal-content");
this.modal=this.initializeModal();
this.questionSaver=new w();
this.bindings()
}z.prototype.bindings=function(){this.$el.on("submit","form",q);
this.$el.on("submit","form",i.bind(this));
this.$el.on("keyup","#question",this.onChangeQuestion.bind(this));
this.$el.on("change","select",s);
this.$el.on("submit","form",s)
};
z.prototype.initializeModal=function(){var C="#contact-modal",D=$(C).data("o2-modal");
if(D===undefined){D=new a(C)
}D.on("close",d);
return D
};
z.prototype.open=function(){this.modal.open();
this.loadContent().then(this.insertContent.bind(this))
};
z.prototype.close=function(){this.modal.close()
};
z.prototype.loadContent=function(){this.setLoading(true);
return $.get(this.url).always(this.setLoading.bind(this,false))
};
z.prototype.insertContent=function(C){this.$content.html(C);
this.initSavedQuestion();
this.initDateFields();
if($("#contact-host-panel").hasClass("new")){$("#contact-modal").addClass("new")
}};
z.prototype.initDateFields=function(){var C={minDate:0,maxDate:"+3Y",nextText:"",prevText:"",numberOfMonths:1,showButtonPanel:true,closeText:I18n.t("clear_dates","Clear Dates"),fixed:true};
this.$content.calendarDateSpan({listingId:this.listing.hostingId,minNights:this.listing.minNights,lastUpdated:this.listing.lastUpdated,onCheckinClose:s,onCheckoutClose:s,defaultsCheckin:C,defaultsCheckout:C});
v()
};
z.prototype.setLoading=function(C){this.$content.toggleClass("loading",C)
};
z.prototype.initSavedQuestion=function(){var C=this.questionSaver.getSavedQuestion();
if(C){$("#question").val(C)
}};
z.prototype.onChangeQuestion=function(C){this.questionSaver.onChangeQuestion(C)
};
function f(C){alert(C)
}function q(){Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"contact_host_modal",step:"clicked_send",action:"click"})
}function i(J){if(J){J.preventDefault()
}var D,H,E;
var C=$.datepicker._defaults.dateFormat;
var G=$.trim($("#message_checkin").val());
var F=$.trim($("#message_checkout").val());
if(G===C||G===""||F===C||F===""){f(t("complete_dates"));
return
}if($("#question").is(":disabled")){f(t("cannot_message_unavailable_dates"));
return
}D=$.datepicker.parseDate(G);
if(!g(D)||(yesterday>D)){f(t("please_enter_valid_start_date"));
return
}H=$.datepicker.parseDate(F);
if((H.getTime()-D.getTime())>32000000000){f(t("please_enter_valid_date_range"));
return
}E=$.trim($("#question").val());
if(E===""){f(t("enter_message"));
return
}if(Airbnb.Utils.isUserLoggedIn){if(!AirbnbRooms.needsVerifications){x(this)
}else{var I=this;
y("#contact_requirements");
$(".verification-flow-container").verificationFlow({onComplete:function(){x(I)
},metaData:{page:"page3_contact_me"}})
}}else{this.modal.off("close",d);
this.modal.close();
Airbnb.SignupLoginModal.launchLogin();
Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"signup_login_modal",step:"signup_login_launched",action:"impression"});
Airbnb.SignInUp.addLoginCallback(function(){this.modal.open();
Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"signup_login_modal",step:"logged_in",action:"submit"});
i.call(this)
}.bind(this))
}}function m(){$("#question").attr("disabled","disabled");
$("#message_button").attr("disabled","disabled");
$("#question_holder").css("opacity","0.5")
}function o(C){if(C){l(C);
$("#messaging-errors").addClass("other").removeClass("not-available")
}else{$("#messaging-errors").addClass("not-available").removeClass("oher")
}}function k(){var C=$("#question").removeAttr("disabled");
$("#message_button").removeAttr("disabled");
if(C.val().length===0){C.val(" ");
C.val("")
}$("#question_holder").css("opacity","1.0");
$("#messaging-errors").removeClass("not-available").removeClass("other")
}function s(){var C=$.datepicker._defaults.dateFormat,E=$("#message_checkin").val(),D=$("#message_checkout").val(),G=$("#message_number_of_guests").val(),F;
Flash.clear();
h();
if(E===C||D===C){return false
}F={checkin:E,checkout:D,number_of_guests:G};
Airbnb.Mediator.trigger("p3::updateSubtotal");
$.getJSON(check_dates_url,F,function(H){m();
if(H.available){k()
}else{o(H.error_message)
}})
}function g(C){if(Object.prototype.toString.call(C)!=="[object Date]"){return false
}return !isNaN(C.getTime())
}function h(){$("#checkin").val($("#message_checkin").val());
$("#checkout").val($("#message_checkout").val());
$("#number_of_guests").val($("#message_number_of_guests").val())
}function v(){if(A.check_inputs(false)){$("#message_checkin").val($("#checkin").val());
$("#message_checkout").val($("#checkout").val());
$("#message_number_of_guests").val($("#number_of_guests").val());
s()
}}function l(D,C){$("#dates_other_error").html("<strong>"+D+"</strong> "+(C||""))
}function u(){window.location="/s"
}function x(C){var H=$("#message_form");
var G=H.attr("action");
var F=$("#question").val(),E=$("#message_checkin").val(),D=$("#message_checkout").val();
C.setLoading(true);
$.post(G,H.serialize(),function(J){var I=new n(J.upsell_presenter);
if(J.message&&!!J.message.match(/As a precaution/)){window.location="/users/security_check"
}if(J.is_logged_in){Airbnb.SignInUp.broadcastLogin({refresh:false})
}if(J.message===""){Airbnb.doConversions();
C.questionSaver.clearSavedQuestion();
if(J.show_verified_id_upsell){y("#verified-id-container")
}else{if(J.show_profile_pic_upsell){C.close();
p(J)
}else{if(I.shouldShowTreatment()){y("#p3-upsell-treatment")
}else{y("#multi-messaging")
}}}Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"contact_host",step:"delivered_message",action:"sent"})
}else{Flash.error(J.message)
}},"json").always(function(){C.setLoading(false)
});
return false
}function y(C){$(".contact-host-panel").addClass("hide").filter(C).removeClass("hide")
}function p(C){Airbnb.Mediator.trigger("guestOnboarding::profilePicUpsell",function(){var E=enderRequire("profile_pic_upsell/upsell_modal");
var D=new E({tracking_event_name:"contact_host_profile_pic_upsell_modal",flow:"contact_host_profile_pic_upsell",isNewbie:C.is_newbie,showWeiboButton:C.show_weibo_button,showFacebookButton:C.show_facebook_button,showGoogleButton:C.show_google_button,didUploadTextBelow:[I18n.t("profile_pic_upsell.recommend_booking_before_first_stay"),I18n.t("profile_pic_upsell.easier_to_book")].join(" "),didNotUploadTextBelow:[I18n.t("profile_pic_upsell.recommend_booking_before_first_stay"),I18n.t("profile_pic_upsell.easier_to_book")].join(" ")});
D.render()
})
}function d(){Airbnb.Mediator.trigger("p3::contactHostLogging",{section:"contact_host_modal",action:"close"})
}b.exports=z
},{"../../verification_flow.js":38,"../utils":23,"./p3_upsell":20,"./question_saver":21,o2:"o2"}],20:[function(c,d,a){var b=c("underscore");
function f(g){this.options=g||{};
this.addTrackingContext();
this.logEvent({action:"IMPRESSION",});
this.bindings()
}f.prototype.bindings=function(){$("#p3-upsell-treatment .js-submit-book-it").on("click",this.onClickBookIt.bind(this))
};
f.prototype.onClickBookIt=function(g){AirbnbRooms.submitBookItForm()
};
f.prototype.addTrackingContext=function(){var g=b.extend({listing_id:AirbnbRooms.options.hostingId},this.options.tracking_context);
Airbnb.Tracking.addContext(g)
};
f.prototype.logEvent=function(g){Airbnb.Tracking.logEvent({event_name:"P3",event_data:b.extend({page:"LISTING_PAGE",section:"CONTACT_ME_UPSELL",instant_book:this.isInstantBookable(),},g),})
};
f.prototype.shouldShowTreatment=function(){return this.options.show_treatment&&this.isInstantBookable()
};
f.prototype.isInstantBookable=function(){return AirbnbRooms.isInstantBookable()
};
d.exports=f
},{underscore:"underscore"}],21:[function(f,h,c){var b="p3/question_saver/question",g=2000,d=f("underscore");
function a(){}a.prototype.onChangeQuestion=d.debounce(function(i){this.saveQuestion(i.currentTarget.value)
},100);
a.prototype.saveQuestion=function(i){if(i.length>g){i=i.slice(0,g)
}amplify.store(b,i)
};
a.prototype.clearSavedQuestion=function(){amplify.store(b,null)
};
a.prototype.getSavedQuestion=function(){return amplify.store(b)
};
h.exports=a
},{underscore:"underscore"}],22:[function(c,b,i){function d(s){var r=0,o=0,v=0,q="",u,p;
for(r=0;
r<s.length;
++r){u=s[r][0];
p=s[r][1];
q+=g(o,v,u,p);
o=u;
v=p
}q+=g(o,v,s[0][0],s[0][1]);
return q
}function g(r,s,w,x){var o=Math.round(w*100000),q=Math.round(r*100000),y=Math.round(x*100000),p=Math.round(s*100000),v=y-p,u=o-q;
return k(u)+k(v)
}function k(o){var p=o<<1;
if(o<0){p=~(p)
}return(m(p))
}function m(p){var o="";
while(p>=32){o+=(String.fromCharCode((32|(p&31))+63));
p>>=5
}o+=(String.fromCharCode(p+63));
return o
}function h(o){return o*Math.PI/180
}function n(o){return o*180/Math.PI
}function a(o,p,x){var v=x/6371,w=h(p),r=h(o.lat),u=h(o.lng),q=Math.asin(Math.sin(r)*Math.cos(v)+Math.cos(r)*Math.sin(v)*Math.cos(w)),s=u+Math.atan2(Math.sin(w)*Math.sin(v)*Math.cos(r),Math.cos(v)-Math.sin(r)*Math.sin(q));
if(isNaN(q)||isNaN(s)){return null
}return{lat:n(q),lng:n(s)}
}function f(o){return o.lat+","+o.lng
}function j(s){var r=[],p=s.length,q,o;
for(o=0;
o<p;
o++){q=s[o];
r.push([q.lat,q.lng])
}return r
}function l(){return{createCircleAroundPoint:function(o,p){var q=[],r;
for(r=0;
r<=360;
r+=5){q.push(a(o,r,p))
}return q
},createEncodedPath:function(s,v){var u="|",p=[],r=j(s),o=d(r),q;
for(q in v){p.push(q+":"+v[q])
}p.push("enc:"+o);
return"&path="+p.join(u)
},getOffsetCenterParams:function(p,o){var q=a(p,270,o*3);
return"&center="+f(q)
}}
}b.exports=l
},{}],23:[function(b,c,a){var d={translate:function(g){var j=$("#description_text_wrapper"),i=j.attr("data-machine-translation"),l=$("#new_translate_button_wrapper"),f=l.find(".translate_button_label"),h=l.find(".gBrandingText"),m=j.attr("data-display-lang");
Airbnb.Tracking.logEvent({event_name:"google_translate_hosting_description_click",event_data:{user_lang:g,display_lang:m,hosting_id:AirbnbRooms.hostingId,new_translation_created:(i==null),shown_review_translate_opt:($("#review-translate-button-wrapper")!=null)}});
if(i){j.html(i);
f.html(I18n.t("show_original_description"));
h.addClass("translated")
}else{var k=l.find("#new_translate_button");
k.attr("disabled",true);
f.html(I18n.t("translating"));
$(".trans").each(function(n,p){var o=$(p);
$.getJSON("/rooms/ajax_google_translate_description",{target_lang:g,hosting_id:AirbnbRooms.hostingId,purpose:"rooms.js"},function(q){if(q&&q.translated_text){o.html(q.translated_text);
k.attr("disabled",false);
f.html(I18n.t("show_original_description"));
h.addClass("translated")
}})
})
}$("#disclaimer_text").html(I18n.t("translate_disclaimer"))
},translate_reviews:function(g,k){var j=$("#review-translate-button-wrapper"),f=j.find(".review_translate_button_label"),h=j.find(".gBrandingText");
var i=j.find("#review-translate-button");
i.attr("disabled",true);
f.html(I18n.t("translating"));
f.data("translate-review-text",f.innerHTML);
Airbnb.Tracking.logEvent({event_name:"google_translate_reviews_click",event_data:{user_lang:g,hosting_id:AirbnbRooms.hostingId}});
$.getJSON("/rooms/ajax_google_translate_reviews",{target_lang:g,hosting_id:AirbnbRooms.hostingId,purpose:"rooms.js",review_ids:k},function(l){if(l){$(".review-text").each(function(m,p){var n=$(p);
var o=n.data("review-id");
n.data("original-text",p.innerHTML);
if(l[o]&&l[o]["comments"]){n.html(l[o]["comments"]["text"])
}});
$(".review-translation-language").each(function(m,p){var n=$(p);
var o=n.data("review-id");
if(l[o]&&l[o]["comments"]&&l[o]["comments"]["language_code"]!=g){n.html(l[o]["comments"]["disclaimer"])
}});
$(".review-response-text").each(function(m,p){var n=$(p);
var o=n.data("review-id");
n.data("original-text",p.innerHTML);
if(l[o]&&l[o]["response"]){n.html(l[o]["response"]["text"])
}});
$(".review-response-language").each(function(m,p){var n=$(p);
var o=n.data("review-id");
if(l[o]&&l[o]["response"]&&l[o]["response"]["language_code"]!=g){n.html(l[o]["response"]["disclaimer"])
}});
i.attr("disabled",false);
f.html(I18n.t("show_original_reviews"));
h.addClass("translated")
}})
},redo_search:function(g){var i=["/s/"],h=$("#display-address"),f;
if(h.length){f=Airbnb.SearchUtils.location_to_url_parameter(h.data("location"));
if(f){i.push(f)
}}i.push("?",$.param({checkin:$("#checkin").val(),checkout:$("#checkout").val(),guests:$("#number_of_guests").val()}));
window.location=i.join("")
},check_inputs:function(g,h,f){g=typeof(g)!="undefined"?g:true;
h=typeof(h)!="undefined"?h:"checkin";
f=typeof(f)!="undefined"?f:"checkout";
if(this.calendar_is_not_set_date(h)){if(g){this.calendar_show_cal(h)
}return false
}if(this.calendar_is_not_set_date(f)){if(g){this.calendar_show_cal(f)
}return false
}return true
},viewOtherListings:function(g){var f=this.formatDate($("#checkin").val()),i=this.formatDate($("#checkout").val()),j=$("#view_other_listings_button").data("reasonCode"),h={event_name:"listing_view",event_data:{operation:"click",page:"p3",section:"view_other_listings",hosting_id:AirbnbRooms.hostingId,reason_code:j,checkin_date:f,checkout_date:i}};
if(this.check_inputs()){Airbnb.Tracking.queueEvent(h);
this.redo_search()
}else{Airbnb.Tracking.logEvent(h)
}g.preventDefault()
},formatDate:function(f){if(!f){return null
}return $.datepicker.formatDate($.datepicker.parseDate(f))
},calendar_is_not_set_date:function(g){var f,h;
if(typeof(g)==="string"){f=$("#"+g)
}else{f=$(g)
}h=f.val();
return($.trim(h)==="")||(f.hasClass("placeholder")&&h===f.attr("placeholder"))
},calendar_show_cal:function(i,f,h){if(arguments.length<3){h="checkout"
}f=typeof(f)!="undefined"?f:"absolute";
var g=0;
if(h!="one_calendar_override"){if(this.calendar_is_not_set_date(i)){if(typeof(i)==="string"){$("#"+i).datepicker("show")
}else{$(i).datepicker("show")
}}else{if(this.calendar_is_not_set_date(h)){$("#"+h).datepicker("show")
}}}}};
c.exports=d
},{}],24:[function(g,c,i){var l=g("backbone"),m=g("underscore"),d=g("o2"),k=g("./book_it/price_refresher"),b=g("./book_it/profile_pic_helpers"),f=g("../globals/refresh_subtotal"),j,a,n;
j={initialize:function(o){d.matchMedia.on("lg",function(p){if(p.matches&&!this.stickyCTAInitialized){this.setupStickyCTA();
this.stickyCTAInitialized=true
}}.bind(this));
this.setupMediaQueryListeners();
this._calendarFixed=false;
Airbnb.Mediator.on("p3::refreshSubtotal",this.onSubtotalRefresh.bind(this));
Airbnb.Mediator.on("p3::refreshSubtotal",this.setupProfilePicWidget.bind(this));
Airbnb.Mediator.on("p3::personalize",this.onPersonalization.bind(this));
Airbnb.Mediator.on("p3::viewCalendar",function(){$("#checkin").focus()
});
this.subtotalRefresher=f;
this.subtotalRefresher.init();
this.initDatepicker(o.hostingId,o.minNights,o.calendarLastUpdated);
this.initParams();
this.isMonthly=o.isMonthly;
this.defaultNightlyPrice=o.nightly_price;
this.defaultStaggeredPrice=o.staggered_price;
this.setPriceFromData(o);
this.pfPicUploaderJSPath=o.pfPicUploaderJSPath;
this.initResponsiveBookit()
},initResponsiveBookit:function(){var o=this.$el;
var r=this.$el.parent();
var q=new d.Modal("#book-it-sm-modal",{trigger:"#book-it-sm-trigger"});
var s=$(".mobile-bookit-btn-container").removeClass("hide");
var p=q.$element.find(".modal-content");
d.matchMedia.on("sm",function(u){if(u.matches){o.show().appendTo(p)
}else{o.appendTo(r);
q.close()
}})
},events:{"change #number_of_guests":"refreshSubtotal"},initParams:function(){var o=$.query.load(window.location.href).keys,q=o.checkin,p=o.checkout,s=o.guests,r;
if(q){$("#checkin").val(q).blur().datepicker("minDate","+0d")
}if(p){r=$.datepicker.parseDate(q);
r=fakeQuery.ui.date.relative(r,"+1d");
$("#checkout").val(p).blur().datepicker("minDate",r)
}if(s){$("#number_of_guests").val(s)
}},setupStickyCTA:function(){var K=this.$el,M=$("#summary"),N=$("#host-profile"),D=$(window),I=$("#book_it"),z=$(".book-it-wrapper"),F=$("#pricing"),O=$("#checkin"),v=$("#checkout"),J=this.$(".other-actions"),A=$(".flag-trigger"),q=40,P=null,B,w,u,r,E=false,p=false,o=false,s,C,y,x,H;
window.requestAnimationFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame;
Airbnb.Mediator.on("p3::updateStickyCalculations",function(){B=M.position().top;
w=B-q;
u=N.position().top+N.height();
r=I.height();
if(window.requestAnimationFrame&&!o){o=true;
window.requestAnimationFrame(x)
}});
s=function(){C=D.scrollTop();
if(window.requestAnimationFrame&&!o){o=true;
window.requestAnimationFrame(x)
}else{x()
}this.hidePFPicTooltip()
}.bind(this);
function G(){J.addClass("hide-visually")
}x=function(){var Q=C-B,S=C+q+r,R=false;
if(Q>=q*(-1)){if(P===null){H()
}F.addClass("fixed");
if(S>u){if(!I.hasClass("bottom")){I.addClass("bottom").removeClass("fixed").css("top",u-B-r);
O.blur();
v.blur()
}}else{if(!I.hasClass("fixed")){I.addClass("fixed").removeClass("bottom").css("top",q);
if(P){z.addClass("no-border")
}else{J.addClass("transparent").afterTransition(G)
}if(!A.hasClass("hide")){A.hide()
}}}Airbnb.Mediator.trigger("p3::updateStickyCalculations")
}else{if(I.hasClass("fixed")||I.hasClass("bottom")){h(I,F,P?z:J,A,P)
}}R=I.hasClass("fixed");
if(R&&!this._calendarFixed){K.calendarDateSpan("option","fixed",true);
K.calendarDateSpan("option","fixed",true);
this._calendarFixed=true
}else{if(!R&&this._calendarFixed){K.calendarDateSpan("option","fixed",false);
K.calendarDateSpan("option","fixed",false);
this._calendarFixed=false
}}o=false
}.bind(this);
y=function(){if(p){return
}p=true;
if(D.width()<=1045){if(E){D.off("scroll.airbnb",s);
h(I,F,P?z:J,A,P)
}E=false
}else{if(!E){Airbnb.Mediator.trigger("p3::updateStickyCalculations");
D.on("scroll.airbnb",s);
s()
}E=true
}window.setTimeout(function(){p=false
},200)
};
H=function(){Airbnb.ERF.deliverExperiment("p3_sticky_social_sharing",{control:function(){P=false
},sticky:function(){P=true;
I.removeClass("not_v2").addClass("v2")
},treatment_unknown:function(){P=false
}})
};
$(document).ready(y);
D.on("load",Airbnb.Mediator.trigger.bind(Airbnb.Mediator,"p3::updateStickyCalculations"));
D.resize(y)
},setupMediaQueryListeners:function(){function o(){window.setTimeout(function(){Airbnb.Mediator.trigger("p3::updateStickyCalculations")
},500)
}if(window.matchMedia){window.matchMedia("(min-height: 700px)").addListener(o);
window.matchMedia("(min-height: 850px)").addListener(o);
window.matchMedia("(min-height: 1000px)").addListener(o)
}},initDatepicker:function(q,r,p){var o=this.subtotalRefresher.refresh.bind(this.subtotalRefresher);
$("#book_it_form").calendarDateSpan({listingId:q,minNights:r,lastUpdated:p,onCheckinClose:o,onCheckoutClose:o})
}};
a=m.extend({},k,b,j),n=l.View.extend(a);
function h(r,o,s,p,q){r.removeClass("fixed bottom").css("top",0);
o.removeClass("fixed");
if(q){s.removeClass("no-border")
}else{s.removeClass("hide-visually transparent")
}if(!p.hasClass("hide")){p.show()
}Airbnb.Mediator.trigger("p3::updateStickyCalculations")
}c.exports=n
},{"../globals/refresh_subtotal":15,"./book_it/price_refresher":25,"./book_it/profile_pic_helpers":26,backbone:"backbone",o2:"o2",underscore:"underscore"}],25:[function(b,d,a){var f=b("o2"),c={refreshSubtotal:function(){this.subtotalRefresher.refresh()
},setPrice:function(h,i){$("#price_amount").html(h);
$("#subtotal_area").toggleClass("hide",!i);
$("#per_night").toggleClass("hide",!i);
$("#per_month").toggleClass("hide",i)
},setPriceFromData:function(j){var h=$("#price_amount"),i,k;
if(j.staggered||this.isMonthly){i=j.staggered_price;
k=false
}else{i=j.price_per_night||j.nightly_price;
k=true
}this.setPrice(i,k);
$("#per_month .icon").toggleClass("hide",k||!j.available)
},resetPrice:function(){var h=this.isMonthly?this.defaultStaggeredPrice:this.defaultNightlyPrice;
this.setPrice(h,!this.isMonthly)
},onSubtotalRefresh:function(k){var m=$("#tax-descriptions-tip"),h=!$("#checkin").val()||!$("#checkout").val(),j=k&&!!k.available,l=k&&k.tax_amount_native>0,i=$("#book_it_status");
$("#book_it_disabled").toggleClass("hide",h||j);
$("#book_it_enabled").toggleClass("hide",!(h||j));
if(h){this.resetPrice();
$("#subtotal_area").addClass("hide");
$("#price-info-tooltip").addClass("hide");
i.removeClass("loading");
return
}if(k.available){this.setPriceFromData(k);
if(k.staggered){$("#subtotal_area").addClass("hide");
$("#monthly-breakdown").html(JST["p4/partials/monthly_billing_breakdown"]({tax_descriptions:k.tax_descriptions,subtotal:k.accommodations,guest_pays_vat:k.guest_pays_vat,service_fee:k.service_fee,taxes:I18n.priceString(k.tax_amount_native),show_tax_data:l}))
}else{i.removeClass("panel-body");
g(k);
if(l){m.html(JST["p4/partials/tax_descriptions"]({tax_descriptions:k.tax_descriptions}))
}}AirbnbRooms.setInstantBookable(k.can_instant_book)
}else{this.resetPrice();
$("#book_it_disabled_message").html(k.reason_message)
}i.removeClass("loading");
$("#book_it").toggleClass("display-subtotal",!!k.available&&!k.staggered);
$("#summary .page-container > .row").toggleClass("row-space-6",!k.available&&!!k.reason_message);
Airbnb.Mediator.trigger("p3::updateStickyCalculations")
},onPersonalization:function(k){var h=$.query.load(window.location.href).keys,j=h.checkin,i=h.checkout;
if(j&&i){this.refreshSubtotal()
}this.defaultNightlyPrice=k.nightly_price;
this.defaultStaggeredPrice=k.staggered_price;
this.setPriceFromData(k)
}};
function g(j){var k=$("#tax-descriptions-tip"),h=$("#service-fee-tip"),i;
i=[{description:I18n.t("Price per night x nights",{basePricePerNight:j.price_per_night,smart_count:j.nights}),value:j.subtotal}];
if(j.extras_price){i.push({description:I18n.t("Cleaning fee"),value:j.extras_price})
}if(j.service_fee){if(j.guest_pays_vat){$(".fee-no-vat-tooltip").addClass("hide");
$(".fee-vat-tooltip").removeClass("hide")
}i.push({description:I18n.t("Service fee"),tooltip:{id:"service-fee-tooltip"},value:j.service_fee});
if(h&&h.data()){h.data()["o2-tooltip"]=undefined
}}if(j.tax_amount_native>0){i.push({description:I18n.t("occupancy_taxes"),tooltip:{id:"tax-descriptions-tooltip"},value:I18n.priceString(j.tax_amount_native)});
if(k&&k.data()){k.data()["o2-tooltip"]=undefined
}}$("#subtotal_area").addClass("panel-padding-fit").removeClass("hide").html(JST["page3/o2.1/subtotal"]({components:i,total:{description:I18n.t("Total"),value:j.total_price_with_fees}}));
f.Tooltip.bind()
}d.exports=c
},{o2:"o2"}],26:[function(b,c,a){var f=b("../../../profile_pic_uploader/tooltip"),d;
d={setupProfilePicWidget:function(g){if(g&&g.can_upload_photo_to_instant_book){this.initProfilePicWidget();
this.setProfilePicWidgetLink({display:true})
}else{this.setProfilePicWidgetLink({display:false})
}},initProfilePicWidget:function(){if(this._pf_pic_uploader){return
}$.when($.getScript(this.pfPicUploaderJSPath)).done(function(){this._pf_pic_uploader=new f({trigger:".profile-pic-upsell-launcher",success:this.$el.submit.bind(this.$el),tracking_event_name:"profile_pic_upsell",tracking_additional_info:{id_listing:AirbnbRooms.hostingId,page:"p3k"}})
}.bind(this))
},setProfilePicWidgetLink:function(g){$("#pf-pic-prompt-container").toggleClass("hide",!g.display);
Airbnb.Tracking.logEvent({event_name:"profile_pic_upsell",event_data:{section:"ib_upsell",page:"p3k",operation:g.display?"impression":"non_impression",id_listing:AirbnbRooms.hostingId,}})
},hidePFPicTooltip:function(){if(this._pf_pic_uploader){this._pf_pic_uploader.hideTooltip()
}}};
c.exports=d
},{"../../../profile_pic_uploader/tooltip":34}],27:[function(b,d,a){var g=["extras_price","localized_people_pricing_description","monthly_price","security_deposit","weekly_price"];
var f=b("backbone"),c;
c=f.View.extend({initialize:function(){Airbnb.Mediator.on("p3::personalize",this.onPersonalization.bind(this))
},onPersonalization:function(h){$.each(g,function(k,l){var j;
if(h[l]){j=this.$el.find("#"+l+"_string");
if(j.length){j.html(h[l])
}}}.bind(this))
}});
d.exports=c
},{backbone:"backbone"}],28:[function(b,c,a){var f=b("backbone");
var d=f.View.extend({initialize:function(){Airbnb.Mediator.on("p3::personalize",function(g){this.initSocialConnections(g.social_connections,g.show_fb_cta)
}.bind(this))
},initSocialConnections:function(m,k){var g=2,q=m.relationships,h=q&&q.length,l=m.connected,p=this.$(".social-connections-section"),n,o,r,j;
if(!l&&k){p.find(".facebook-button-wrapper").addBack().removeClass("hide");
p.find(".fb-button").click(function(i){var s=$(this);
ga("send","event","Authenticate","FacebookClick","Page3SocialConnections");
FB.login(function(u){if(u.authResponse){ga("send","event","Authenticate","FacebookLogin","Page3SocialConnections");
window.location.href=s.data("redirect_uri")
}else{ga("send","event","Authenticate","FacebookDeny","Page3SocialConnections")
}},{scope:Airbnb.FACEBOOK_PERMS});
i.preventDefault()
})
}if(h){o=p.find(".social-connections-list");
for(n=0;
n<Math.min(g,h);
n++){o.append(JST["page3/o2.1/social_connection"](q[n]))
}if(h>g){r=p.find(".more-connections-link").removeClass("hide");
j=p.find("#more-count").html(h-g);
r.one("click",function(i){for(n=g;
n<h;
n++){o.append(JST["page3/o2.1/social_connection"](q[n]))
}r.remove();
i.preventDefault()
})
}p.find(".social-connections").addBack().removeClass("hide")
}}});
c.exports=d
},{backbone:"backbone"}],29:[function(b,a,f){var i=b("underscore"),h=b("backbone"),c=b("../../views/shared/sliding_carousel"),d=b("../../neighborhoods/neighborhoods_popover"),g=b("./location/map"),j;
j=h.View.extend({initialize:function(){i.bindAll(this,"handleItemChange","initNeighborhood");
Airbnb.Mediator.on("p3::lazyLoadSections",function(){var l=this;
var k=Airbnb.Utils;
this.$map=$("#map");
this.$neighborhoodElem=this.$("[data-neighborhood-id]");
this.containsNeighborhood=this.$neighborhoodElem.length;
this.mapProvider=$("#map").data("provider");
this.isOpenStreetMap=this.mapProvider==="Mapbox";
this.isAlternateMapProvider=this.isOpenStreetMap;
this.isTabletOrPhone=k.isIos()||k.isAndroid();
this.mapDeferred=$.Deferred();
this.neighborhoodDeferred=$.Deferred();
if(this.isTabletOrPhone&&!this.isAlternateMapProvider){this.initStaticMap()
}else{this.initInteractiveMap()
}this.initNeighborhood();
$.when(this.mapDeferred,this.neighborhoodDeferred).then(function(){l.addNeighborhoodPolygonToMap()
},function(){l.mapDeferred.done(function(){if(l.isTabletOrPhone&&!l.isAlternateMapProvider){l.addStaticGoogleMap()
}})
})
}.bind(this))
},handleItemChange:function(k){var l=this.$(".dot");
l.removeClass("dot-ebisu");
l.eq(k.index).addClass("dot-ebisu")
},initInteractiveMap:function(){var k;
if(this.isOpenStreetMap){Airbnb.Utils.withOpenStreetMap((function(){g.initOpenStreetMap();
this.mapDeferred.resolve()
}).bind(this));
k=Airbnb.Utils.loadOpenStreetMap.bind(Airbnb.Utils,"p3")
}else{Airbnb.Utils.withGooglePlaces((function(){g.initGoogleMap();
this.mapDeferred.resolve()
}).bind(this));
k=Airbnb.Utils.loadGooglePlaces.bind(Airbnb.Utils)
}if(document.readyState==="complete"){k()
}else{$(window).on("load",k)
}},initStaticMap:function(){var k=this.$map.height(),m=this.$map.width(),l=b("../shared/static_map_helpers");
this.staticMapHelpers=new l();
this.staticMapUrl=this.$map.data("staticMapUrl");
this.staticMapUrl=this.staticMapUrl.replace("size=","size="+m+"x"+k);
this.staticMapUrl+=this.getHostingEncodedPolyline();
this.mapDeferred.resolve()
},initNeighborhood:function(){if(this.containsNeighborhood){this.model=new d({id:this.$neighborhoodElem.data("neighborhood-id")});
this.model.fetch({success:function(k){this.$neighborhoodElem.attr("href",k.get("url"));
this.neighborhoodDeferred.resolve();
this.render()
}.bind(this),error:function(){this.neighborhoodDeferred.reject()
}.bind(this)})
}else{this.neighborhoodDeferred.reject()
}},render:function(){var n=JST["page3/o2.1/location_card"],m=" &middot; ",k=[],l=this.model;
if(l.hasThumbnails()){$.each(this.model.get("tags"),function(p,q){k.push(q.name)
});
$("#neighborhood-seo-link").remove();
$("#hover-card").prepend(n({tags:k.join(m),name:l.get("name"),topline:l.get("topline"),url:l.get("url"),thumbnails:l.get("thumbnails"),launched:l.get("launched")}));
var o=new c({el:this.$(".neighborhood-sliding-carousel"),shouldLoop:true});
this.listenTo(o,"change:item",this.handleItemChange)
}else{if(!l.get("launched")){$("#neighborhood-seo-link").addClass("not-launched")
}}return this
},addNeighborhoodPolygonToMap:function(){var k;
if(this.isOpenStreetMap){Airbnb.Utils.withOpenStreetMap((function(){this.addNeighborhoodPolygonToOpenStreetMap()
}).bind(this))
}else{k=this.getNeighborhoodPolygonToGoogle();
if(!this.isTabletOrPhone){Airbnb.Utils.withGooglePlaces((function(){this.renderInteractiveNeighborhoodGoogle(k)
}).bind(this))
}else{this.staticMapUrl+=this.getNeighborhoodEncodedPolyline(k);
this.addStaticGoogleMap()
}}},getNeighborhoodPolygonToGoogle:function(){var l=this.model.get("bounds"),m=[],k={};
if(l&&l.coordinates&&l.coordinates[0]&&l.coordinates[0][0]){i.each(l.coordinates[0][0],function(o,n){m.push({lat:o[1],lng:o[0]})
});
k={paths:m,strokeColor:"#FFAA91",strokeWeight:2,fillColor:"#FFAA91",fillOpacity:0.2}
}return k
},renderInteractiveNeighborhoodGoogle:function(l){var n=[],m,k;
i.each(l.coords,function(o){n.push(new google.maps.LatLng(latlng.lat,latlng.lng))
});
m=new google.maps.Polygon(l);
k=this.$map.airbnbGoogleMap().map;
m.setMap(k)
},getNeighborhoodEncodedPolyline:function(l){var q={color:l.strokeColor.replace("#","0x"),fillcolor:l.fillColor.replace("#","0x")+"33",weight:l.strokeWeight},p=this.staticMapHelpers.createEncodedPath(l.paths,q),o=encodeURIComponent(this.staticMapUrl).length+encodeURIComponent(p).length,m=2048,n=30,k=54;
if(o+k+n<m){return p
}return""
},getHostingEncodedPolyline:function(){var p={lat:this.$map.data("lat"),lng:this.$map.data("lng")},l=AirbnbConstants.MapCircleSizes[14]/1000,k=this.staticMapHelpers.getOffsetCenterParams(p,l),n=[],o=this.staticMapHelpers.createCircleAroundPoint(p,l),q={color:AirbnbConstants.GoogleMapCircleStyles.strokeColor.replace("#","0x"),fillcolor:"0x00D1C133",weight:AirbnbConstants.GoogleMapCircleStyles.strokeWeight},m=this.staticMapHelpers.createEncodedPath(o,q);
return k+m
},addStaticGoogleMap:function(){$.ajax({url:"/rooms/ajax_signed_image_url",data:{unsigned_url:this.staticMapUrl},dataType:"json",success:(function(k){this.$map.prepend('<img src="'+k.signed_url+"\" alt='"+I18n.t("location_map")+"' />")
}).bind(this)})
},addNeighborhoodPolygonToOpenStreetMap:function(){var m=[],l=this.model.get("bounds"),k;
if(l&&l.coordinates&&l.coordinates[0]&&l.coordinates[0][0]){i.each(l.coordinates[0][0],function(o,n){m.push(L.latLng(o[1],o[0]))
});
k=L.polygon(m,{color:"#FFAA91",weight:2,fillColor:"#FFAA91",opacity:0.2});
k.addTo($("#map").airbnbOpenStreetMap().map)
}}});
a.exports=j
},{"../../neighborhoods/neighborhoods_popover":12,"../../views/shared/sliding_carousel":40,"../shared/static_map_helpers":22,"./location/map":30,backbone:"backbone",underscore:"underscore"}],30:[function(b,c,a){var d={initGoogleMap:function(){var w=14,r=11,m={cafe:"cup",wifi:"wifi",other:"flag",kid:"group-alt",store:"shopping-bag",bar:"wine-glasses",restaurant:"meal",groceries:"meal",art:"balloons"};
var u=[],j=[],h=$("#map"),n=new google.maps.LatLng(h.data("lat"),h.data("lng")),y,s,p;
h.airbnbGoogleMap({position:n,isFuzzy:true,accuracy:8,showSmallControls:true});
var g=h.airbnbGoogleMap(),q=g.map,f=350,k=new InfoBox({closeBoxURL:"",pane:"floatPane",alignBottom:true,infoBoxClearance:new google.maps.Size(15,50),enableEventPropagation:true,pixelOffset:new google.maps.Size(-1*(f/2-40),-50),zIndex:2,boxStyle:{width:f+"px"}});
google.maps.event.addListener(q,"click",function(){k.close()
});
h.on("click",function(z){if($(z.target).hasClass("close-box")){k.close()
}});
var x=false,o=$("#guidebook-recommendations li.user-image a"),l=o.find("img"),v={profileUrl:o.attr("href"),name:l.attr("alt"),profileImgUrl:l.attr("src")};
var i=new google.maps.LatLngBounds();
$("#guidebook-recommendations li.recommendation").each(function(B,F){x=true;
var A=$(F),D=$("span.location",A).html(),z=new google.maps.LatLng(A.data("lat"),A.data("lng")),E=JST["page3/o2.1/location_infobox"],C=new google.maps.Marker({clickable:true,position:z,map:q,icon:new google.maps.MarkerImage(A.data("img"),null,null,new google.maps.Point(11,37))});
google.maps.event.addListener(C,"click",function(){var G=$("div.description",A);
G.children().css("margin-bottom","0");
k.setContent(E({title:$("h2 a",A).html(),titleLink:$("h2 a",A).attr("href"),hasLocation:D!=="",location:D,type:A.data("type"),desc:G.html().trim(),icon:m[A.data("type")],user:v,hideCloseBox:false,hostRecommendation:I18n.t("host_recommendation")}));
k.open(q,C)
});
u.push(C);
i.extend(z)
});
if(x){p=g.marker.getBounds();
i.extend(p.getNorthEast());
i.extend(p.getSouthWest());
q.fitBounds(i);
google.maps.event.addListenerOnce(q,"bounds_changed",function(){if(this.getZoom()>14){this.setZoom(14)
}})
}if(n.lng()<=i.getCenter().lng()){q.panBy(-200,0)
}},initBingMap:function(){var w=14,i=11,j={cafe:"cup",wifi:"wifi",other:"flag",kid:"group-alt",store:"shopping-bag",bar:"wine-glasses",restaurant:"meal",groceries:"meal",art:"balloons"};
var f,s,u=[],m=[],p=$("#map"),n=new Microsoft.Maps.Location(p.data("lat"),p.data("lng"));
p.airbnbBingMap({position:n,isFuzzy:true,accuracy:8,streetViewControl:false,showSmallControls:true});
var o=p.airbnbBingMap().map,h=350,q=new Microsoft.Maps.Infobox(n,{offset:new Microsoft.Maps.Point(-1*h/2-30,30),typeName:Microsoft.Maps.InfoboxType.mini,showPointer:false,showCloseButton:true,zIndex:2,width:h+"px",visible:false});
o.entities.push(q);
Microsoft.Maps.Events.addHandler(o,"click",function(){q.setOptions({visible:false})
});
Microsoft.Maps.Events.addHandler(q,"click",function(x){if($(x.originalEvent.target).hasClass("close-box")){q.setOptions({visible:false})
}});
var l=false,k=$("#guidebook-recommendations li.user-image a"),g=k.find("img"),v={profileUrl:k.attr("href"),name:g.attr("alt"),profileImgUrl:g.attr("src")},r=[n];
$("#guidebook-recommendations li.recommendation").each(function(z,C){l=true;
var y=$(C),x=new Microsoft.Maps.Location(y.data("lat"),y.data("lng")),B=JST["page3/o2.1/location_infobox"],A=new Microsoft.Maps.Pushpin(x,{icon:y.data("img")});
Microsoft.Maps.Events.addHandler(A,"click",function(){var D=$("div.description",y);
D.children().css("margin-bottom","0");
q.setLocation(x);
q.setHtmlContent(B({title:$("h2 a",y).html(),titleLink:$("h2 a",y).attr("href"),location:$("span.location",y).html(),type:y.data("type"),desc:D.html().trim(),icon:j[y.data("type")],user:v,hideCloseBox:false,mapProvider:"bing",hostRecommendation:I18n.t("host_recommendation")}));
q.setOptions({pushpin:A,visible:true});
A.setOptions({infobox:q})
});
Microsoft.Maps.Events.addHandler(A,"mouseover",function(D){o.getRootElement().style.cursor="pointer"
});
Microsoft.Maps.Events.addHandler(A,"mouseout",function(D){o.getRootElement().style.cursor="default"
});
o.entities.push(A);
r.push(x)
});
if(l){o.setView({bounds:Microsoft.Maps.LocationRect.fromLocations(r)});
Microsoft.Maps.Events.addHandler(o,"viewchangeend",function(x){if(o.getZoom()>16){o.setView({zoom:16})
}})
}},initOpenStreetMap:function(){var v=14,p=11,m={cafe:"cup",wifi:"wifi",other:"flag",kid:"group-alt",store:"shopping-bag",bar:"wine-glasses",restaurant:"meal",groceries:"meal",art:"balloons"};
var x,r,s=[],i=[],h=$("#map"),n=L.latLng(h.data("lat"),h.data("lng"));
h.airbnbOpenStreetMap({position:n,isFuzzy:true,accuracy:8,showSmallControls:true});
var q=h.airbnbOpenStreetMap(),g=q.map,f=350,j=L.popup({offset:L.point(15,8),closeButton:false,maxWidth:f});
h.on("click",function(y){if($(y.target).hasClass("close-box")){g.closePopup(j)
}});
var w=false,l=L.latLngBounds([]),o=$("#guidebook-recommendations li.user-image a"),k=o.find("img"),u={profileUrl:o.attr("href"),name:k.attr("alt"),profileImgUrl:k.attr("src")};
$("#guidebook-recommendations li.recommendation").each(function(A,E){w=true;
var z=$(E),C=$("span.location",z).html(),y=L.latLng(z.data("lat"),z.data("lng")),D=JST["page3/o2.1/location_infobox"],B=L.marker(y,{clickable:true,icon:L.icon({iconUrl:z.data("img")})});
B.addTo(g);
B.on("click",function(){var F=$("div.description",z);
F.children().css("margin-bottom","0");
j.setLatLng(B.getLatLng()).setContent(D({title:$("h2 a",z).html(),titleLink:$("h2 a",z).attr("href"),hasLocation:C!=="",location:C,type:z.data("type"),desc:F.html().trim(),icon:m[z.data("type")],user:u,hideCloseBox:false,hostRecommendation:I18n.t("host_recommendation")})).openOn(g)
});
s.push(B);
l.extend(y)
});
if(w){hostingCircleBounds=q.marker.getBounds();
l.extend(hostingCircleBounds.getNorthEast());
l.extend(hostingCircleBounds.getSouthWest());
g.fitBounds(l);
g.addOneTimeEventListener("load",function(){if(g.getZoom()>14){g.setZoom(14)
}})
}if(l.isValid()&&n.lng<=l.getCenter().lng){g.panBy(L.point(-200,0))
}}};
c.exports=d
},{}],31:[function(c,f,b){var a=c("o2").Modal,h=c("backbone"),d=c("../globals/slideshow"),g;
g=h.View.extend({resizeCooldown:200,cooldownActive:false,slideshowLoaded:false,initialize:function(k){this.options=k||{};
if(this.options.photoData.length>1){this.initModal();
$(window).on("load",this.initSlideshow.bind(this))
}if(!window.matchMedia&&this.$el.hasClass("with-photos")){$(window).on("resize",this.handleWindowResize.bind(this));
this.handleWindowResize()
}var j=$('[data-hook="cover-img-container"]');
var i=j.find('[data-hook="img-sm"]');
var m=j.find('[data-hook="img-lg"]').css("background-image");
try{m=m.replace(/^url\(["']?/,"").replace(/["']?\)$/,"")
}catch(l){m=null
}if(m){$('<img style="display:none;">').on("load",function(){i.css("background-image",'url("'+m+'")')
}).attr("src",m)
}},initModal:function(){this.photoModal=new a("#photo-modal");
$(".photo-trigger").on("click",function(i){var j=$(i.currentTarget).data("index");
i.preventDefault();
this.slideshow.toIndex(j);
this.photoModal.open();
this.logEvent({action:"CLICK",target:"INLINE_IMAGE",index:j})
}.bind(this));
this.photoModal.on("open",function(){this.$(".photo-chevron").addClass("hide")
}.bind(this));
this.photoModal.on("close",function(){this.$(".photo-chevron").removeClass("hide");
this.$(".slideshow-caption-container").removeClass("collapsed");
this.logEvent({action:"CLICK",target:"SLIDESHOW_CLOSE"})
}.bind(this));
this.$(".slideshow-media-caption").hover(this.onThumbnailsMouseover.bind(this),this.collapseThumbnailViewport.bind(this,true))
},initSlideshow:function(){var j,i={photoData:this.options.photoData},k=this;
if(this.slideshowLoaded){return
}this.slideshowLoaded=true;
j=this.$(".slideshow-thumbnails");
j.html(JST["page3/o2.1/slideshow_thumbnails"](i));
j.find("li:nth-child(2) img").on("load",function(){k.slideshow=new d($("#photo-modal"),{thumbnailWidth:j.find("li:nth-child(2)").width()+10,onChange:function(n,m,o){var l={index:m};
k.addVerifiedLabel(n,m);
if(typeof o==="string"){l.action="KEYPRESS";
if(o==="keyboardLeft"){l.target="KEYBOARD_LEFT"
}else{l.target="KEYBOARD_RIGHT"
}}else{l.action="CLICK";
o=$(o);
if(o.attr("data-slideshow-prev")){l.target="PREV_BUTTON"
}else{if(o.attr("data-slideshow-next")){l.target="NEXT_BUTTON"
}else{if(o.hasClass("slideshow-images")){l.target="SLIDESHOW_IMAGE"
}else{if(o.hasClass("media-slideshow")){l.target="THUMBNAIL"
}}}}}k.logEvent(l)
}})
})
},events:{"click .cover-img":"openCarousel","click .photo-chevron":"openCarousel","click .slideshow-images":"onSlideshowClick","click .slideshow-images img":"carouselPhotoClick"},logEvent:function(i){Airbnb.Tracking.logEvent({event_name:"P3",event_data:$.extend({page:"LISTING_PAGE",section:"PHOTO_SLIDESHOW"},(i||{}))})
},openCarousel:function(){if(!this.slideshowLoaded){this.initSlideshow();
this.slideshowLoaded=true
}if(this.photoModal){this.photoModal.open();
this.collapseThumbnailTimeout=window.setTimeout(this.collapseThumbnailViewport.bind(this,true),2000);
this.logEvent({action:"CLICK",target:"HEADER_IMAGE"})
}},onSlideshowClick:function(i){if(this.photoModal&&!$(i.target).is("img")){this.photoModal.close();
this.logEvent({action:"CLICK",target:"CAROUSEL_OVERLAY"})
}},addVerifiedLabel:function(k,i){var j=$(".slideshow-thumbnails li").eq(i),l=j.find("a").data("professional");
this.$(".slideshow-professional").toggleClass("hide",!l)
},carouselPhotoClick:function(i){this.slideshow.next(i.currentTarget)
},handleWindowResize:function(i){var l,k,j="";
if(this.cooldownActive){return
}this.cooldownActive=true;
l=$(window);
k=l.height();
this.$el.removeClass("medium large xlarge");
if(k>=1000){j="xlarge"
}else{if(k>=850){j="large"
}else{if(l.height()>=700){j="medium"
}}}this.$el.addClass(j);
window.setTimeout(function(){this.cooldownActive=false
}.bind(this),this.resizeCooldown)
},onThumbnailsMouseover:function(){if(this.collapseThumbnailTimeout){window.clearTimeout(this.collapseThumbnailTimeout);
this.collapseThumbnailTimeout=null
}this.collapseThumbnailViewport(false)
},collapseThumbnailViewport:function(i){this.$(".slideshow-caption-container").toggleClass("collapsed",i)
}});
f.exports=g
},{"../globals/slideshow":16,backbone:"backbone",o2:"o2"}],32:[function(d,f,b){var c=d("underscore"),h=d("o2"),i=d("backbone"),a=d("../../views/shared/sliding_carousel"),g;
g=i.View.extend({initialize:function(j){this.options=j;
Airbnb.Mediator.on("p3::dateGuestChange",this.update.bind(this));
Airbnb.Mediator.on("p3::lazyLoadSections",this.lazyInitialize.bind(this))
},lazyInitialize:function(){var j=$.query.load(window.location.href).keys;
this.loggedImpression=false;
this.scrollIndex=0;
if(!j.checkin||!j.checkout){this.update(j)
}this.pageScrollTracker()
},events:{"click .carousel-chevron":"scroll","click .listing":"logClick",},update:function(j){this.params=c.defaults(j,{checkin:"",checkout:"",guests:""});
if(h.matchMedia.is("sm")){this.params.num_results=3
}$.getJSON("/rooms/"+this.options.hostingId+"/similar_listings",this.params,this.handleResults.bind(this))
},logClick:function(m){var j=$(m.target),k=$(m.currentTarget);
if(j.hasClass("icon-heart-alt")||j.hasClass("wish_list_button")){var l="similar_listings_wishlist"
}else{if(!j.hasClass("host-img")){var l="similar_listings_listing"
}}this.eventLogger(l,"click",k.attr("data-id"))
},scroll:function(l){var k=$(l.currentTarget);
if(k.hasClass("left")){var j="similar_listings_scroll_left"
}else{var j="similar_listings_scroll_right"
}this.eventLogger(j,"click",null)
},pageScrollTracker:function(){var k=this;
var j=false;
$(window).scroll(function(){if(!j){k.logImpression();
j=true;
window.setTimeout(function(){j=false
},500)
}});
Airbnb.Mediator.on("p3::refreshSubtotal",function(l){k.loggedImpression=false
})
},logImpression:function(){var l=this;
var j=200,k=$(document).height()-$("#footer").height()-$(window).height();
if(($(window).scrollTop()>=k-j)&&(this.loggedImpression==false)){this.$el.find(".carousel-item:first .listing").each(function(m,o){var n=o.getAttribute("data-id");
l.eventLogger("similar_listings_impression","impression",n)
})
}},eventLogger:function(m,j,k){var l={event_name:"similar listings",event_data:{page:"p3",section:m,operation:j,hosting_id:AirbnbRooms.hostingId,recommendation_id:k,checkin:this.params.checkin,checkout:this.params.checkout,guests:this.params.guests}};
Airbnb.Tracking.logEvent(l);
this.loggedImpression=true
},handleResults:function(o){var p=o&&o.properties,j=o&&o.debug,u={groups:[]},q,l,k,m,n,s;
if(!p||!p.length){this.$el.addClass("hide");
return
}this.$el.removeClass("hide");
n=0;
s=p.length;
while(n<s){q={index:n/3,cards:p.slice(n,n+3)};
u.groups.push(q);
n+=3
}if(this.carousel){this.carousel.undelegateEvents()
}l=JST["p3/similar_listings"]({cardGroups:u},{partials:JST});
this.$el.find(".similar-listings-results").html(l);
if(j){m=JSON.stringify(j,null,2);
k=[];
k.push('<div class="page-container-responsive">');
k.push("<pre>");
k.push(m);
k.push("</pre>");
k.push("</div>");
this.$el.append(k.join(""))
}this.carousel=new a({el:this.$el.find(".sliding-carousel")});
var r=this;
this.listenTo(this.carousel,"change:item",function(w){var v=w.idx;
var x=$(w.item);
x.find(".listing").each(function(y,z){var A=z.getAttribute("data-id");
r.eventLogger("similar_listings_impression","impression",A)
})
});
Airbnb.WishListButton.update()
}});
f.exports=g
},{"../../views/shared/sliding_carousel":40,backbone:"backbone",o2:"o2",underscore:"underscore"}],33:[function(d,f,c){var b=d("o2").Modal;
var a={output_format:"jpg",image_size:"640x480",snapper_size:"tiny",camera_security_type:"remember",jpg_quality:80,hide_321_btn:0,hide_effect_btn:1,license_domain:"airbnb.com",license_key:"4OHNxa1NRZmZGTUFWYjB5VGZrUFZOK0oxZHo3Vk5CdmwrUkc1ajBZQmszbmgzMG96bXZtVUF4TWd5TzE1WVl6RGpSdnNmQzBhYkRjZy8zRWlUTGJWTVU9PQ==",};
var g=AIR.Views.BaseView.extend({template:"profile_pic_uploader/templates/confirmation_modal",events:{"click .confirmation":"onConfirmation",},initialize:function(){this.trackingEventName=this.options.tracking_event_name;
this.trackingAdditionalInfo=this.options.tracking_additional_info;
this.method=this.options.method||""
},postRender:function(){if(this.method==="take_a_photo"){this.initWebcam();
this.toggleInterface();
this.openModal()
}else{this.fetchPicture().always(function(h){if(h.id===0){this.$(".panel-header, .panel-body, .alert-danger, .confirmation").toggleClass("hide");
Airbnb.Tracking.logEvent(this.extendTrackingInfo({method:this.method,error_type:"profile_pic_upload_failure"}))
}this.openModal()
}.bind(this))
}},setUserPic:function(h){this.modalUserPicUrl=h.large_url;
Airbnb.header.setThumbnailUrl(h.large_url)
},fetchPicture:function(){return $.getJSON("/users/profile_pic",function(i){var j,h;
if(i.id!==0){h=this.$(".guest-picture-container");
h.addClass("loading");
j=this.$(".guest-picture");
j.on("load",function(){h.removeClass("loading")
});
j.attr("src",i.large_url);
this.setUserPic(i);
Airbnb.Tracking.logEvent({event_name:"edit_profile",event_data:{operation:"add",page:"media",section:"profile_photo",picture_id:i.id,}})
}}.bind(this))
},openModal:function(){this.modal=new b(this.$el.find(".modal"));
this.setElement($(".modal.ib-upsell"));
this.delegateEvents();
this.modal.open();
this.modal.on("close",function(){this.trigger("modal-closed")
}.bind(this));
this.$("[data-behavior=modal-close]").on("click",function(){Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_upload_redo",operation:"click",method:this.method}))
}.bind(this))
},initWebcam:function(){Snapper.configure(a);
Snapper.embed({target:"webcam-container",complete:this.webcamComplete.bind(this)})
},webcamComplete:function(h){this.fetchPicture().always(function(i){this.toggleInterface()
}.bind(this))
},toggleInterface:function(){var h=this.$(".modal-content");
var i=h.css("max-width")=="360px"?350:360;
h.css("max-width",i);
this.$(".confirmation-interface, .webcam-interface").toggleClass("hide")
},onConfirmation:function(){this.modal.close();
if(this.options.success){this.options.success()
}this.trigger("photo-confirmed");
var h=this.extendTrackingInfo({section:"ib_upsell_upload_accept",operation:"click",method:this.method,});
h.queue=true;
Airbnb.Tracking.logEvent(h)
},extendTrackingInfo:function(h){return{event_name:this.trackingEventName,event_data:$.extend(h,this.trackingAdditionalInfo)}
},});
if(typeof f!=="undefined"&&f.exports){f.exports=g
}else{provide("profile_pic_uploader/confirm_modal",g)
}},{o2:"o2"}],34:[function(b,c,a){var d=b("o2").Tooltip,f;
if(typeof c!="undefined"){f=b("./modal.js")
}else{f=enderRequire("profile_pic_uploader/confirm_modal")
}var g=AIR.Views.BaseView.extend({template:"profile_pic_uploader/templates/uploader_tooltip",className:"tooltip tooltip-top-middle",events:{"click .upload-with-facebook":"fbButtonHandler","click .upload-photo":"uploadHandler","click .upload-using-webcam":"webcamHandler",},initialize:function(){this.tooltip=new d(this.el,this.options.trigger,{event:"click"});
this.trackingEventName=this.options.tracking_event_name||"pf_pic_uploader";
this.trackingAdditionalInfo=this.options.tracking_additional_info||{};
this.tooltipOpen=false;
this.tooltip.on("show",function(){this.tooltipOpen=true;
Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_open_dropdown",operation:"click"}))
}.bind(this));
this.tooltip.on("hide",function(){this.tooltipOpen=false;
Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_close_dropdown",operation:"click"}))
}.bind(this));
this.isObseleteBrowser=$.browser.msie&&parseInt($.browser.version,10)<9;
this.render()
},postRender:function(){this.containerDiv=this.$(".upload-container")
},hideTooltip:function(){if(this.tooltipOpen){this.tooltip.hide()
}},webcamHandler:function(h){Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_select_method",operation:"click",method:"take_a_photo"}));
this.openConfirmationModal({uploadMethod:"take_a_photo"})
},fbButtonHandler:function(h){Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_select_method",operation:"click",method:"connect_with_facebook"}));
this.hideTooltip();
Airbnb.Utils.fbButtonClickHandlerFactory("p3 profile pic",this.onFacebookSave.bind(this))(h)
},onFacebookSave:function(){this.tooltip.show();
this.openConfirmationModal({uploadMethod:"connect_with_facebook"})
},uploadHandler:function(h){Airbnb.Tracking.logEvent(this.extendTrackingInfo({section:"ib_upsell_select_method",operation:"click",method:"upload_from_computer"}));
this.initIFrame()
},initIFrame:function(){this.iframeContext=this.$("#upload_form_frame")[0].contentWindow;
this.iframeContext.ProfilePicWidget=this;
this.clearCurrentImg();
this.iframeContext.jQuery("#user_profile_pic").on("change",this.uploadFileStart.bind(this));
if(this.isObseleteBrowser){this.$(".upload-photo-button").addClass("hide");
this.$("#upload_form_frame").removeClass("hide")
}else{var h=this.iframeContext.jQuery("#user_profile_pic");
h.trigger("click")
}},clearCurrentImg:function(){this.iframeContext.$('input[type="file"]').val(null)
},uploadFileStart:function(i){var h=$(i.currentTarget).val();
this.containerDiv.addClass("loading");
if(this.isValidFile(h)){this.getUploadForm().submit()
}else{this.getUploadForm()[0].reset()
}},isValidFile:function(h){return h!==""&&h.match(/([^\\]+)\.(jpeg|jpg|png)$/i)
},getUploadForm:function(){return this.iframeContext.jQuery("#ajax_upload_form")
},uploadFileCallback:function(){this.openConfirmationModal({uploadMethod:"upload_from_computer"})
},openConfirmationModal:function(h){this.containerDiv.removeClass("loading");
this.confirmationModalView=new f({success:this.options.success,method:h.uploadMethod||"",tracking_event_name:this.trackingEventName,tracking_additional_info:this.trackingAdditionalInfo});
if(this.isObseleteBrowser){this.containerDiv.addClass("hide")
}else{this.$el.parent().append(this.confirmationModalView.el)
}this.confirmationModalView.render();
this.hideTooltip();
this.listenTo(this.confirmationModalView,"modal-closed",this.cleanUpModal);
this.listenTo(this.confirmationModalView,"photo-confirmed",function(){this.trigger("upload-finished")
})
},cleanUpModal:function(){this.confirmationModalView.cleanup();
this.confirmationModalView=null;
this.containerDiv.removeClass("hide")
},extendTrackingInfo:function(h){return{event_name:this.trackingEventName,event_data:$.extend(h,this.trackingAdditionalInfo)}
},});
if(typeof c!="undefined"&&c.exports){c.exports=g
}else{provide("profile_pic_uploader/tooltip",g)
}},{"./modal.js":33,o2:"o2"}],35:[function(c,d,a){var b=c("underscore");
function f(h,g){this._collection=h;
this._options=b.extend({},this._options,g)
}b.extend(f.prototype,{_index:0,_collection:null,_options:{onChange:false,shouldLoop:true},_nextIndex:function(){var g=this._index+1;
return this._options.shouldLoop?(g%this._collection.length):g
},_prevIndex:function(){var h=this._index-1,g=this._collection.length;
return this._options.shouldLoop?(h+g)%g:h
},peek:function(g){g=(typeof g!=="undefined")?g:this._nextIndex();
return this._collection[g]
},hasNext:function(){return this._options.shouldLoop||this._index+1<this._collection.length
},hasPrevious:function(){return this._options.shouldLoop||this._index>0
},next:function(g){return this.toIndex(this._nextIndex(),g)
},previous:function(g){return this.toIndex(this._prevIndex(),g)
},curr:function(){return this._collection[this._index]
},toIndex:function(g,h){if(!this._collection||this._collection.length===0){return null
}if(!this._options.shouldLoop&&(g<0||g>=this._collection.length)){throw"Index out of bounds."
}this._index=g;
if(typeof(this._options.onChange)==="function"){this._options.onChange.call(this,this._collection[this._index],this._index,h)
}return this.curr()
}});
if(typeof d!=="undefined"){d.exports=f
}else{if(provide){provide("simple_iterator",f)
}}},{underscore:"underscore"}],36:[function(b,c,a){!(function(d){$(window).on("load",function(){LazyLoad.js("//cdn.embedly.com/widgets/platform.js",function(){var f=$("a.embedly-btn");
f.on("click",function(g){embedly.modal({lang:f.data("embedly-locale")});
g.preventDefault()
})
})
})
})()
},{}],37:[function(require,module,exports){Airbnb.Utils.withGooglePlaces(function(){eval(function(p,a,c,k,e,r){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))
};
if(!"".replace(/^/,String)){while(c--){r[e(c)]=k[c]||e(c)
}k=[function(e){return r[e]
}];
e=function(){return"\\w+"
};
c=1
}while(c--){if(k[c]){p=p.replace(new RegExp("\\b"+e(c)+"\\b","g"),k[c])
}}return p
}('6 8(a){a=a||{};r.s.1P.2j(2,36);2.M=a.1y||"";2.1z=a.1q||J;2.U=a.1H||0;2.G=a.1B||1g r.s.1Y(0,0);2.E=a.Y||1g r.s.2B(0,0);2.X=a.V||t;2.1p=a.1s||"2g";2.1m=a.F||{};2.1G=a.1E||"39";2.N=a.1j||"34://31.r.2W/2Q/2O/2K/1u.2I";3(a.1j===""){2.N=""}2.19=a.1A||1g r.s.1Y(1,1);3(p a.A==="q"){3(p a.18==="q"){a.A=L}v{a.A=!a.18}}2.w=!a.A;2.17=a.1n||J;2.1I=a.2f||"2d";2.15=a.1l||J;2.4=t;2.z=t;2.14=t;2.T=t;2.B=t;2.R=t}8.9=1g r.s.1P();8.9.24=6(){5 i;5 f;5 a;5 d=2;5 c=6(e){e.20=L;3(e.1i){e.1i()}};5 b=6(e){e.2T=J;3(e.1Z){e.1Z()}3(!d.15){c(e)}};3(!2.4){2.4=16.2N("2M");2.1d();3(p 2.M.1v==="q"){2.4.Q=2.I()+2.M}v{2.4.Q=2.I();2.4.1e(2.M)}2.2F()[2.1I].1e(2.4);2.1t();3(2.4.7.C){2.R=L}v{3(2.U!==0&&2.4.Z>2.U){2.4.7.C=2.U;2.4.7.2A="2x";2.R=L}v{a=2.22();2.4.7.C=(2.4.Z-a.13-a.12)+"11";2.R=J}}2.1r(2.1z);3(!2.15){2.B=[];f=["2q","1N","2p","2o","1M","2n","2m","2l","2k"];1o(i=0;i<f.1L;i++){2.B.1K(r.s.u.1c(2.4,f[i],c))}2.B.1K(r.s.u.1c(2.4,"1N",6(e){2.7.1J="2i"}))}2.T=r.s.u.1c(2.4,"2h",b);r.s.u.S(2,"2e")}};8.9.I=6(){5 a="";3(2.N!==""){a="<2c";a+=" 2b=\'"+2.N+"\'";a+=" 2a=12";a+=" 7=\'";a+=" Y: 29;";a+=" 1J: 28;";a+=" 27: "+2.1G+";";a+="\'>"}K a};8.9.1t=6(){5 a;3(2.N!==""){a=2.4.3f;2.z=r.s.u.1c(a,"1M",2.26())}v{2.z=t}};8.9.26=6(){5 a=2;K 6(e){e.20=L;3(e.1i){e.1i()}r.s.u.S(a,"3e");a.1u()}};8.9.1r=6(d){5 m;5 n;5 e=0,H=0;3(!d){m=2.1F();3(m 3d r.s.3c){3(!m.25().3a(2.E)){m.38(2.E)}n=m.25();5 a=m.37();5 h=a.Z;5 f=a.23;5 k=2.G.C;5 l=2.G.1k;5 g=2.4.Z;5 b=2.4.23;5 i=2.19.C;5 j=2.19.1k;5 o=2.21().35(2.E);3(o.x<(-k+i)){e=o.x+k-i}v 3((o.x+g+k+i)>h){e=o.x+g+k+i-h}3(2.17){3(o.y<(-l+j+b)){H=o.y+l-j-b}v 3((o.y+l+j)>f){H=o.y+l+j-f}}v{3(o.y<(-l+j)){H=o.y+l-j}v 3((o.y+b+l+j)>f){H=o.y+b+l+j-f}}3(!(e===0&&H===0)){5 c=m.33();m.32(e,H)}}}};8.9.1d=6(){5 i,F;3(2.4){2.4.30=2.1p;2.4.7.2Z="";F=2.1m;1o(i 2Y F){3(F.2X(i)){2.4.7[i]=F[i]}}3(p 2.4.7.1f!=="q"&&2.4.7.1f!==""){2.4.7.2V="2S(1f="+(2.4.7.1f*2R)+")"}2.4.7.Y="2P";2.4.7.P=\'1b\';3(2.X!==t){2.4.7.V=2.X}}};8.9.22=6(){5 c;5 a={1a:0,1h:0,13:0,12:0};5 b=2.4;3(16.1w&&16.1w.1X){c=b.2L.1w.1X(b,"");3(c){a.1a=D(c.1W,10)||0;a.1h=D(c.1V,10)||0;a.13=D(c.1U,10)||0;a.12=D(c.1T,10)||0}}v 3(16.2J.O){3(b.O){a.1a=D(b.O.1W,10)||0;a.1h=D(b.O.1V,10)||0;a.13=D(b.O.1U,10)||0;a.12=D(b.O.1T,10)||0}}K a};8.9.2H=6(){3(2.4){2.4.2G.2U(2.4);2.4=t}};8.9.1x=6(){2.24();5 a=2.21().2E(2.E);2.4.7.13=(a.x+2.G.C)+"11";3(2.17){2.4.7.1h=-(a.y+2.G.1k)+"11"}v{2.4.7.1a=(a.y+2.G.1k)+"11"}3(2.w){2.4.7.P=\'1b\'}v{2.4.7.P="A"}};8.9.2D=6(a){3(p a.1s!=="q"){2.1p=a.1s;2.1d()}3(p a.F!=="q"){2.1m=a.F;2.1d()}3(p a.1y!=="q"){2.1S(a.1y)}3(p a.1q!=="q"){2.1z=a.1q}3(p a.1H!=="q"){2.U=a.1H}3(p a.1B!=="q"){2.G=a.1B}3(p a.1n!=="q"){2.17=a.1n}3(p a.Y!=="q"){2.1D(a.Y)}3(p a.V!=="q"){2.1R(a.V)}3(p a.1E!=="q"){2.1G=a.1E}3(p a.1j!=="q"){2.N=a.1j}3(p a.1A!=="q"){2.19=a.1A}3(p a.18!=="q"){2.w=a.18}3(p a.A!=="q"){2.w=!a.A}3(p a.1l!=="q"){2.15=a.1l}3(2.4){2.1x()}};8.9.1S=6(a){2.M=a;3(2.4){3(2.z){r.s.u.W(2.z);2.z=t}3(!2.R){2.4.7.C=""}3(p a.1v==="q"){2.4.Q=2.I()+a}v{2.4.Q=2.I();2.4.1e(a)}3(!2.R){2.4.7.C=2.4.Z+"11";3(p a.1v==="q"){2.4.Q=2.I()+a}v{2.4.Q=2.I();2.4.1e(a)}}2.1t()}r.s.u.S(2,"2C")};8.9.1D=6(a){2.E=a;3(2.4){2.1x()}r.s.u.S(2,"1Q")};8.9.1R=6(a){2.X=a;3(2.4){2.4.7.V=a}r.s.u.S(2,"2z")};8.9.2y=6(a){2.w=!a;3(2.4){2.4.7.P=(2.w?"1b":"A")}};8.9.2w=6(){K 2.M};8.9.1C=6(){K 2.E};8.9.2v=6(){K 2.X};8.9.2u=6(){5 a;3((p 2.1F()==="q")||(2.1F()===t)){a=J}v{a=!2.w}K a};8.9.2t=6(){2.w=J;3(2.4){2.4.7.P="A"}};8.9.3b=6(){2.w=L;3(2.4){2.4.7.P="1b"}};8.9.2s=6(c,b){5 a=2;3(b){2.E=b.1C();2.14=r.s.u.2r(b,"1Q",6(){a.1D(2.1C())})}2.1O(c);3(2.4){2.1r()}};8.9.1u=6(){5 i;3(2.z){r.s.u.W(2.z);2.z=t}3(2.B){1o(i=0;i<2.B.1L;i++){r.s.u.W(2.B[i])}2.B=t}3(2.14){r.s.u.W(2.14);2.14=t}3(2.T){r.s.u.W(2.T);2.T=t}2.1O(t)};',62,202,"||this|if|div_|var|function|style|InfoBox|prototype||||||||||||||||typeof|undefined|google|maps|null|event|else|isHidden_|||closeListener_|visible|eventListeners_|width|parseInt|position_|boxStyle|pixelOffset_|yOffset|getCloseBoxImg_|false|return|true|content_|closeBoxURL_|currentStyle|visibility|innerHTML|fixedWidthSet_|trigger|contextListener_|maxWidth_|zIndex|removeListener|zIndex_|position|offsetWidth||px|right|left|moveListener_|enableEventPropagation_|document|alignBottom_|isHidden|infoBoxClearance_|top|hidden|addDomListener|setBoxStyle_|appendChild|opacity|new|bottom|stopPropagation|closeBoxURL|height|enableEventPropagation|boxStyle_|alignBottom|for|boxClass_|disableAutoPan|panBox_|boxClass|addClickHandler_|close|nodeType|defaultView|draw|content|disableAutoPan_|infoBoxClearance|pixelOffset|getPosition|setPosition|closeBoxMargin|getMap|closeBoxMargin_|maxWidth|pane_|cursor|push|length|click|mouseover|setMap|OverlayView|position_changed|setZIndex|setContent|borderRightWidth|borderLeftWidth|borderBottomWidth|borderTopWidth|getComputedStyle|Size|preventDefault|cancelBubble|getProjection|getBoxWidths_|offsetHeight|createInfoBoxDiv_|getBounds|getCloseClickHandler_|margin|pointer|relative|align|src|img|floatPane|domready|pane|infoBox|contextmenu|default|apply|touchmove|touchend|touchstart|dblclick|mouseup|mouseout|mousedown|addListener|open|show|getVisible|getZIndex|getContent|auto|setVisible|zindex_changed|overflow|LatLng|content_changed|setOptions|fromLatLngToDivPixel|getPanes|parentNode|onRemove|gif|documentElement|mapfiles|ownerDocument|div|createElement|en_us|absolute|intl|100|alpha|returnValue|removeChild|filter|com|hasOwnProperty|in|cssText|className|www|panBy|getCenter|http|fromLatLngToContainerPixel|arguments|getDiv|setCenter|2px|contains|hide|Map|instanceof|closeclick|firstChild".split("|"),0,{}));
window.InfoBox=InfoBox
})
},{}],38:[function(b,c,a){(function(g,i,h){var f=g._,d;
d=h.VerificationFlow=function(j){this.options=i.extend({element:null,showIntro:false,onComplete:function(){},metaData:{}},j);
this.init()
};
d.prototype={states:{basic_profile:1,profile_photo:2,phone_verification:3,real_name:4,full_profile:5,confirmed_email:6},eventPrefix:"verification_flow.",statesFlipped:{},numStates:0,currentState:0,init:function(){var j=this,l,n,k,m;
this.element=i(this.options.element);
this.$continue=i(".button-bar a.continue");
this.steps=[];
this.$(".verification-flow-panel").each(function(){j.steps.push(i(this).data("step"))
});
if(this.element.length===0||this.steps.length===0){return
}i.each(this.states,function(p,o){j.statesFlipped[o]=p;
j.numStates++
});
this.sm=new g.SimpleStateMachine(this.states,{context:this});
i.each(this.transitionHandlers,function(o,p){var q=j.states[o];
j.sm.addTransitionHandler(q,p)
});
for(l=this.currentState;
l<=this.numStates;
l++){if(this.$panel(this.statesFlipped[this.currentState]).length){break
}this.currentState++
}if(this.currentState===this.numStates+1){this.finish();
return
}this.sm.transitionTo(this.currentState);
this.$continue.click(function(){j.nextState()
});
if(this.options.showIntro){n=this.element.next(".content-row");
k=this.$(".verification-flow-intro").show();
m=this.$(".verification-flow-panels").hide();
this.$("a.start").click(function(){k.hide();
m.show();
j.start();
n.show()
});
j.trackEvent("show_intro",{numSteps:j.steps.length,steps:j.steps});
n.hide()
}else{j.start()
}if(this.steps.length>1){this.$(".verification-flow-step span:eq(1)").text(this.steps.length)
}else{this.$(".verification-flow-step").hide()
}},start:function(){var j=this;
this.trackEvent("start",{numSteps:j.steps.length,steps:j.steps});
this.updateStep()
},transitionHandlers:{basic_profile:function(){this.$(".verification-flow-panel").hide();
this.$panel("basic_profile").show();
this.$continue.show()
},phone_verification:function(){var j=this;
this.$(".verification-flow-panel").hide();
this.$panel("phone_verification").show();
this.$continue.hide();
i.phoneNumberWidget({showAddNumberInitially:true,onVerifyComplete:function(){j.hasVerifiedPhoneNumber=true;
j.nextState();
return false
},resoCode:this.options.resoCode})
},profile_photo:function(){this.$(".verification-flow-panel").hide();
this.$panel("profile_photo").show();
if(this.options.profilePhotoOptions){ProfilePicWidget.init(this.options.profilePhotoOptions)
}this.$continue.show()
},real_name:function(){this.$(".verification-flow-panel").hide();
this.$panel("real_name").show();
this.$(".button-bar").hide();
this.$continue.show()
},full_profile:function(){this.$(".verification-flow-panel").hide();
this.$panel("full_profile").show();
this.$continue.show()
},confirmed_email:function(){var k=this;
this.trackEvent("confirm_email.start");
this.$(".verification-flow-panel").hide();
var o=this.$panel("confirmed_email");
o.show();
function j(){i.getJSON("/users/request_new_confirm_email?dead_end=true");
k.trackEvent("confirm_email.request_new_email")
}j();
var n=setInterval(function(){i.getJSON("/verification/has_confirmed_email",function(p){if(p.has_confirmed_email){l()
}})
},5000);
function l(){k.trackEvent("confirm_email.email_confirmed");
clearInterval(n);
o.off(".confirmed_email");
k.nextState()
}this.$continue.hide();
var m=o.find(".not-there");
o.on("click.confirmed_email",".resend-link",function(p){p.preventDefault();
i(this).hide();
m.show()
});
o.on("click.confirmed_email",".sendEmail",function(p){p.preventDefault();
j();
m.hide();
o.find(".did-resend").show()
})
}},submitHandlers:{basic_profile:function(l){if(i.trim(i("#user_profile_info_about").val())===""){this.showError("You need to enter a profile description!");
h.mediator.emit("track:additional_desc_continue_click_error",{});
h.mediator.emit("track:additional_desc_continue_click_error_type",{label:"You need to enter a profile description!"})
}else{var k=this.$panel("basic_profile").find("textarea"),j={};
j[k.attr("name")]=k.val();
j.authenticity_token=i("#authenticity-token").data("authenticity-token");
i.ajax({type:"POST",url:k.attr("data-url"),data:j,error:function(m){h.mediator.emit("track:additional_desc_continue_click_error",{});
h.Utils.followRedirectIfPresent(m);
window.location=""
},dataType:"JSON"});
h.mediator.emit("track:additional_desc_continue_click_success",{});
l.call(this)
}},phone_verification:function(j){if(!this.hasVerifiedPhoneNumber){this.showError("You need to verify your phone number before continuing.")
}else{j.call(this)
}},profile_photo:function(k){var j=this;
j.setLoading(true);
i.getJSON("/users/has_profile_pic",function(l){j.setLoading(false);
if(l.has_profile_pic){h.mediator.emit("track:additional_photo_continue_click_success",{});
k.call(j)
}else{h.mediator.emit("track:additional_photo_continue_click_error",{});
h.mediator.emit("track:additional_photo_continue_click_error_type",{label:"You need to add a profile photo before continuing."});
j.showError("You need to add a profile photo before continuing.")
}})
},real_name:function(j){if(!this.hasCompletedRealName){this.showError("You need to confirm your real name before continuing.")
}else{j.call(this)
}},full_profile:function(o){var m=i('select[name="user[sex]"]');
var l=m.val();
var j=i.trim(i("#user_profile_info_current_city").val());
if(l===""){this.showError("You need to tell us your gender before continuing.")
}else{if(j===""){this.showError("You need to tell us your location before continuing.")
}else{var n={"user[sex]":l,"user_profile_info[current_city]":j};
i("#user-birthdate-container select").each(function(q,r){var p=i(r);
n[p.attr("name")]=p.val()
});
var k=i(".verification-flow-panel.full_profile").data("url");
i.post(k,n);
o.call(this)
}}},confirmed_email:function(j){j.call(this)
}},showError:function(j){alert(j)
},setLoading:function(j){if(j){this.element.addClass("loading");
this.$continue.attr("disabled","disabled")
}else{this.element.removeClass("loading");
this.$continue.removeAttr("disabled")
}},nextState:function(){var j=this,m=this.statesFlipped[this.currentState],n=this.submitHandlers[m],l;
for(var k=this.currentState;
k<=this.numStates;
k++){l=k+1;
if(this.$panel(this.statesFlipped[l]).length){break
}}if(this.$panel(m).length){n.call(this,o)
}else{o()
}function o(){j.trackEvent("step_completed."+m);
if(l===j.numStates+1){j.finish()
}else{j.currentState=l;
j.sm.transitionTo(j.currentState);
j.updateStep()
}}},updateStep:function(){var l=this.$(".verification-flow-panel:visible"),k=l.index()===-1?1:l.index()+1,j=this.statesFlipped[this.currentState];
this.$(".verification-flow-step span:first").text(k);
if(k===this.$(".verification-flow-panel").length){this.$continue.text(d.translations.finish)
}this.trackEvent("step_start."+j)
},$:function(j){return this.element.find(j)
},$panel:function(j){return this.$(".verification-flow-panel."+j)
},finish:function(){this.element.addClass("complete");
if(this.options.showIntro){this.$(".verification-flow-panels").hide();
this.$(".verification-flow-complete").show()
}this.options.onComplete.call(this);
this.trackEvent("completed")
},trackEvent:function(m,l){var k=this.eventPrefix+m,j=i.extend({},this.options.metaData,l,{action:m});
h.Tracking.logEvent({event_name:"verification_flow",event_data:j});
this.element.trigger(k)
},bind:function(k,l){var j=this.eventPrefix+k;
this.element.bind(j,l)
}};
d.translations={finish:"Finish"};
d.addTranslations=function(j){i.extend(d.translations,j)
};
i.fn.verificationFlow=function(k){k=i.extend({},k||{},{element:this});
var j=new h.VerificationFlow(k);
i(this).data("verificationFlow",j);
return this
}
})(this,jQuery,Airbnb)
},{}],39:[function(b,c,a){!(function(f){var d=Backbone.View.extend({initialize:function(){_.bindAll(this,"onSubmit","itemClick");
this.$form=this.$("form");
this.$modal=this.$(".flag-modal");
this.$modalContent=this.$modal.find(".modal-content");
if(typeof this.options.afterFlagging==="function"){this.afterFlagging=this.options.afterFlagging
}f(this.el).removeClass("hide");
f(this.options.triggerEl).removeClass("hide")
},events:{"submit form":"onSubmit","click .flag-modal .flag-thank-you .btn":"afterThankYou","click .flag-modal .flag-form .btn":"itemClick"},onSubmit:function(j){var g;
j.preventDefault();
if(this.$form.find('input[name="user_flag[name]"]').val()==="Other"){g=this.$form.find('[name="user_flag[other_note]"]').val();
if(typeof g==="undefined"||g.trim()===""){return
}}this.$modalContent.addClass("loading");
f.post(this.$form.attr("action"),this.$form.serialize(),function(l){if(l.flag_id!=undefined){this.$form.find("#user_flag_id").val(l.flag_id)
}this.afterFlagging&&this.afterFlagging()
}.bind(this));
window.setTimeout(function(){this.$modalContent.removeClass("loading");
this.$modal.find(".other-container").addClass("hide").end().find(".panel-footer").addClass("hide").end().find(".panel-body.flag-form").addClass("hide")
}.bind(this),400);
var i=this.$modal.find(".flag-thank-you");
var h=this.$modal.find(".panel-header.main-header");
var k=this.$modal.find(".panel-header.thanks-header");
h.addClass("hide");
k.removeClass("hide");
i.removeClass("hide")
},afterThankYou:function(g){g.preventDefault();
this.$modal.data("o2-modal").close()
},itemClick:function(j){var h=f(j.currentTarget),i=h.parent(),g;
this.$form.find('input[name="user_flag[name]"]').val(h.data("reason-id"));
if(i.hasClass("other")){g=i.find("textarea");
g.val("");
i.addClass("clicked");
i.find(".other-container").removeClass("hide");
this.$modal.find(".panel-footer").removeClass("hide")
}else{i.find("textarea").val("");
this.$form.submit()
}j.preventDefault()
}});
if(typeof c!=="undefined"){c.exports=d
}else{provide("views/shared/flag_widget",d)
}})(jQuery)
},{}],40:[function(d,f,b){var c=d("underscore"),h=d("backbone"),g,a;
if(typeof f!=="undefined"){g=d("../../simple_iterator")
}else{g=enderRequire("simple_iterator")
}a=h.View.extend({initialize:function(i){var k=this.$el.find(".carousel-item");
var j=k.first().outerWidth()*k.length;
c.bindAll(this,"onChange");
this.iterator=new g(k,{onChange:this.onChange,shouldLoop:this.options.shouldLoop||false});
this.$itemList=this.$el.find(".carousel-item-list");
this.options=i;
this.itemWidth=k.first().outerWidth();
this.$el.find(".carousel-item-list").width(j);
if(!this.iterator.hasNext()){this.$el.find(".carousel-chevron.right").addClass("hide")
}if(this.options.advanceOnItemClick){this.$el.on("click",".carousel-item",this.doScroll.bind(this))
}},events:{"click .carousel-chevron":"doScroll"},onChange:function(j,i){this.$itemList.css("left",i*this.itemWidth*(-1));
this.$el.find(".carousel-chevron.left").toggleClass("hide",!this.iterator.hasPrevious());
this.$el.find(".carousel-chevron.right").toggleClass("hide",!this.iterator.hasNext());
this.trigger("change:item",{index:i,item:j})
},doScroll:function(i){i.preventDefault();
if($(i.currentTarget).hasClass("left")){if(this.iterator.hasPrevious()){this.iterator.previous()
}}else{if(this.iterator.hasNext()){this.iterator.next()
}}}});
if(typeof f!=="undefined"){f.exports=a
}else{provide("shared/sliding_carousel",a)
}},{"../../simple_iterator":35,backbone:"backbone",underscore:"underscore"}],41:[function(b,c,a){!(function(f){var d=Backbone.View.extend({networks:{twitter:["Twitter","Tweet"],vkontakte:["VK"],qzone:["Qzone"],weibo:["Sina Weibo"],pinterest:["Pinterest","Pin"],facebook:["Facebook"],googlePlus:["Google"],email:["Email"],embedly:["Embedly"]},newWin:null,sharedViaEmail:false,events:{"click .share-btn":"btnClick"},initialize:function(){this.page=this.options.page;
this.truncateOptions()
},truncateOptions:function(j){var g=f(".share-btn"),h=g.length,i="#social-share-tooltip",k=4;
if(h>k+1){f.each(g.slice(k,h),function(m,n){var o=f(n),l=o.removeAttr("data-behavior").html(o.attr("title"));
f(i).append(f("<li>").append(l))
});
f(".more-btn").removeClass("hide");
f(i+" a").on("click",this.btnClick.bind(this))
}},btnClick:function(i){i.preventDefault();
var h=f(i.currentTarget),j=h.attr("href"),g=h.data("network");
if(g==="email"){i.preventDefault();
this.shareViaEmail(h.data("email-share-link"))
}else{if(g!=="embedly"){this.popup(j,335,500)
}}this.socialTracking(g)
},socialTracking:function(g){var j="social",i=this.networks[g],h=i[0],l=i[1]||"Share",k=this.page?this.page:location.pathname;
ga("send",j,h,l,k);
Airbnb.Tracking.logEvent({event_name:j,event_data:{category:h,action:l,page:k}})
},popup:function(j,g,i){var h="resizable,location,height="+g+",width="+i;
if(this.newWin&&!this.newWin.closed){this.newWin.close()
}this.newWin=window.open(j,"newSocialShare",h);
this.newWin.focus()
},shareViaEmail:function(g){if(Airbnb.Utils.isUserLoggedIn){this.showEmailShareModal(g)
}else{Airbnb.SignupLoginModal.launchSignup();
Airbnb.Mediator.on("login",function(){this.showEmailShareModal(g)
}.bind(this))
}},showEmailShareModal:function(g){if(g){f.get(g,function(k){var j=f("<div>").html(k),h=b("o2").Modal.bind(j),i=f("#share-via-email").data("o2-modal");
i.open();
if(!this.sharedViaEmail){this.handleEmailShareSubmit(i);
this.sharedViaEmail=true
}}.bind(this))
}},handleEmailShareSubmit:function(h){var g=f("#share-via-email form"),i=f(".share-error");
g.on("submit",function(j){j.preventDefault();
j.stopPropagation();
f.post(g.attr("action"),g.serialize(),function(k){var l=k.email_share_error;
if(l){i.html(l)
}else{i.html("");
h.close();
f("#send_to").val("")
}},"json")
})
}});
if(typeof c!=="undefined"){c.exports=d
}else{provide("views/shared/social/social_share_widget",d)
}})(jQuery)
},{o2:"o2"}],42:[function(b,c,a){!(function(f){var d;
if(typeof c!=="undefined"){d=b("./flag_widget")
}else{d=enderRequire("views/shared/flag_widget")
}UserFlag=function(g,h){this.init(g,h)
};
f.extend(UserFlag.prototype,{init:function(g,i){var j=i.parent(),h=this;
this.flagLink=j.find(".flag-trigger");
this.mainHeader=j.find(".panel-header.main-header");
this.thanksHeader=j.find(".panel-header.thanks-header");
this.formBody=j.find(".panel-body.flag-form");
this.formThanks=j.find(".panel-body.flag-thank-you");
this.submitButton=j.find("#user_flag_submit");
this.afterFlagged=j.find(".already-flagged");
this.message=j.find(".message-text");
this.hasMessage=this.message.length>0;
this.flagIdHolder=j.find("#user_flag_id");
this.showMessage=this.afterFlagged.find(".show-message");
this.hideMessage=this.afterFlagged.find(".hide-message");
new d({el:i,triggerEl:this.flagLink,afterFlagging:function(){h.markAsFlagged()
}});
this.bindLinks();
if(g.id!=undefined){this.flagIdHolder.val(g.id);
if(!g.redacted){this.markAsFlagged()
}}},undoFlag:function(g){g.preventDefault();
f.ajax({type:"POST",url:"/user_flags/undo",data:{id:this.flagIdHolder.val()},success:(function(h){this.flagLink.removeClass("hide")
}).bind(this)});
this.afterFlagged.addClass("hide");
if(this.hasMessage){this.message.removeClass("hide").removeClass("row-space-top-2")
}},resetModal:function(g){this.formBody.removeClass("hide");
this.formThanks.addClass("hide");
this.thanksHeader.addClass("hide");
this.mainHeader.removeClass("hide");
this.submitButton.removeAttr("disabled")
},markAsFlagged:function(){if(this.hasMessage){this.message.addClass("hide");
this.afterFlagged.removeClass("hide");
this.hideMessage.addClass("hide");
this.showMessage.removeClass("hide")
}else{this.afterFlagged.removeClass("hide")
}this.flagLink.addClass("hide")
},toggleMessageStatus:function(g){g.preventDefault();
this.showMessage.toggleClass("hide");
this.hideMessage.toggleClass("hide");
this.message.toggleClass("hide").toggleClass("row-space-top-2")
},bindLinks:function(){if(this.hasMessage){this.showMessage.on("click",this.toggleMessageStatus.bind(this));
this.hideMessage.on("click",this.toggleMessageStatus.bind(this))
}this.flagLink.on("click",this.resetModal.bind(this));
this.afterFlagged.find(".undo_flag").on("click",this.undoFlag.bind(this))
}})
})(jQuery)
},{"./flag_widget":39}]},{},[13]);