(()=>{"use strict";var n={n:i=>{var t=i&&i.__esModule?()=>i.default:()=>i;return n.d(t,{a:t}),t},d:(i,t)=>{for(var e in t)n.o(t,e)&&!n.o(i,e)&&Object.defineProperty(i,e,{enumerable:!0,get:t[e]})},o:(n,i)=>Object.prototype.hasOwnProperty.call(n,i)};const i=jQuery;var t=n.n(i);t()((function(){if(t()("#csv-panel-export").on("submit",(function(){var n=t()(this);n.find('button[type="submit"]').prop("disabled",!0).siblings(".input-loading").css("visibility","visible"),setTimeout((function(){n.find('button[type="submit"]').prop("disabled",!1).siblings(".input-loading").css("visibility","hidden")}),5e3)})),t()("#csv-import-me").on("change",(function(){t()("#csv-import-warning").removeClass("hidden")})),t()("#csv-panel-import").on("submit",(function(){return confirm(rankMath.confirmCsvImport)})),t()("#csv-import-cancel").on("click",(function(){return confirm(rankMath.confirmCsvCancel)})),t()("#csv-import-progress-details").length){setTimeout((function n(){t().ajax({url:ajaxurl,type:"GET",dataType:"html",data:{action:"csv_import_progress",_ajax_nonce:rankMath.csvProgressNonce}}).done((function(i){t()("#csv-import-progress-details").html(i),t()(i).find("#csv-import-progress-value").length?setTimeout(n,3e3):t()("#csv-import-cancel").addClass("disabled hidden").prop("disabled",!0).siblings(".input-loading").hide()}))}),3e3)}t()("#csv-advanced-options-toggle").on("change",(function(){t()(".csv-advanced-options").stop().slideToggle(400),t()(this).prop("checked")||t()(".csv-advanced-options").find("input").prop("checked",!0)}))}))})();