var sidenavs = document.querySelectorAll('.sidenav')
for (var i = 0; i < sidenavs.length; i++) {
    M.Sidenav.init(sidenavs[i]);
}
var dropdowns = document.querySelectorAll('.dropdown-trigger')
for (var i = 0; i < dropdowns.length; i++) {
    M.Dropdown.init(dropdowns[i]);
}
var collapsibles = document.querySelectorAll('.collapsible')
for (var i = 0; i < collapsibles.length; i++) {
    M.Collapsible.init(collapsibles[i]);
}
var featureDiscoveries = document.querySelectorAll('.tap-target')
for (var i = 0; i < featureDiscoveries.length; i++) {
    M.FeatureDiscovery.init(featureDiscoveries[i]);
}
var materialboxes = document.querySelectorAll('.materialboxed')
for (var i = 0; i < materialboxes.length; i++) {
    M.Materialbox.init(materialboxes[i]);
}
var modals = document.querySelectorAll('.modal')
for (var i = 0; i < modals.length; i++) {
    M.Modal.init(modals[i]);
}
var parallax = document.querySelectorAll('.parallax')
for (var i = 0; i < parallax.length; i++) {
    M.Parallax.init(parallax[i]);
}
var scrollspies = document.querySelectorAll('.scrollspy')
for (var i = 0; i < scrollspies.length; i++) {
    M.ScrollSpy.init(scrollspies[i]);
}
var tabs = document.querySelectorAll('.tabs')
for (var i = 0; i < tabs.length; i++) {
    M.Tabs.init(tabs[i]);
}
var tooltips = document.querySelectorAll('.tooltipped')
for (var i = 0; i < tooltips.length; i++) {
    M.Tooltip.init(tooltips[i]);
}

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.datepicker');
    options = {
        format: 'dd-mm-yyyy',
        yearRange: 60,
        i18n: {
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
            weekdaysAbbrev: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Pronto',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
            selectMonths: true,
            cancel: 'Cancelar',
            clear: 'Limpar'
        }
    }
    var instances = M.Datepicker.init(elems, options);
});