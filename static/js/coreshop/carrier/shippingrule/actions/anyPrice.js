pimcore.registerNS('pimcore.plugin.coreshop.carrier.shippingrules.actions.anyPrice');

pimcore.plugin.coreshop.carrier.shippingrules.actions.anyPrice = Class.create(pimcore.plugin.coreshop.rules.actions.abstract, {

    type : 'anyPrice',

    getForm : function () {

        this.form = new Ext.form.FieldSet({
            items : [

            ]
        });

        return this.form;
    }
});
