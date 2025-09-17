import"./dist-C_ABUlOQ.min.js";import"./runtime-core.esm-bundler-Ca9eACeg.min.js";import"./vue.runtime.esm-bundler-B7l4RX9R.min.js";import"./core-CuG4XPOF.min.js";import"./isObject-BwTgHO42.min.js";import"./_toKey-BLmsLsy5.min.js";import"./set-Cqd4I9bq.min.js";import"./get-BfBXFw95.min.js";import{t as o}from"./virtualRef-CYpkks3b.js";import{t as r}from"./logger-B3j_KY2M.js";import{t as n}from"./windpress-LY8K66Rq.min.js";var s=document.createRange().createContextualFragment(`
    <button id="windpressbuilderius-settings-navbar" data-tooltip-content="WindPress \u2014 Builderius settings" data-tooltip-place="bottom" class="uniPanelButton">
        <span class="">
            ${n}
        </span>
    </button>
`),{getVirtualRef:i}=o({},{persist:"windpress.ui.state"});document.querySelector(".uniTopPanel__rightCol").prepend(s);var e=document.querySelector("#windpressbuilderius-settings-navbar");function a(){let t=i("window.minimized",!1).value;i("window.minimized",!1).value=!t,t?e.classList.add("active"):e.classList.remove("active")}e.addEventListener("click",t=>{a()}),r("Module loaded!",{module:"settings"});
