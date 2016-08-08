pimcore.registerNS('pimcore.plugin.coreshop.carrier.shippingrules.conditions.random');

pimcore.plugin.coreshop.carrier.shippingrules.conditions.random = Class.create(pimcore.plugin.coreshop.rules.conditions.abstract, {
    type : 'random',

    getForm : function () {
        this.form = Ext.create('Ext.form.FieldSet', {
            items : [

            ]
        });

        return this.form;
    }
});
