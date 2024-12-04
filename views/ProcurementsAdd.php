<?php

namespace PHPMaker2025\Pokja2025;

// Page object
$ProcurementsAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { procurements: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fprocurementsadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fprocurementsadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["item_id", [fields.item_id.visible && fields.item_id.required ? ew.Validators.required(fields.item_id.caption) : null], fields.item_id.isInvalid],
            ["supplier_id", [fields.supplier_id.visible && fields.supplier_id.required ? ew.Validators.required(fields.supplier_id.caption) : null], fields.supplier_id.isInvalid],
            ["user_id", [fields.user_id.visible && fields.user_id.required ? ew.Validators.required(fields.user_id.caption) : null], fields.user_id.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
            ["total_price", [fields.total_price.visible && fields.total_price.required ? ew.Validators.required(fields.total_price.caption) : null, ew.Validators.float], fields.total_price.isInvalid],
            ["procurement_date", [fields.procurement_date.visible && fields.procurement_date.required ? ew.Validators.required(fields.procurement_date.caption) : null, ew.Validators.datetime(fields.procurement_date.clientFormatPattern)], fields.procurement_date.isInvalid],
            ["ip", [fields.ip.visible && fields.ip.required ? ew.Validators.required(fields.ip.caption) : null], fields.ip.isInvalid],
            ["_username", [fields._username.visible && fields._username.required ? ew.Validators.required(fields._username.caption) : null], fields._username.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "item_id": <?= $Page->item_id->toClientList($Page) ?>,
            "supplier_id": <?= $Page->supplier_id->toClientList($Page) ?>,
            "status": <?= $Page->status->toClientList($Page) ?>,
        })
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("AddCaption"); ?></h4>
	  <div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
	  </button>
	  </div>
	  <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<form name="fprocurementsadd" id="fprocurementsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="procurements">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->item_id->Visible) { // item_id ?>
    <div id="r_item_id"<?= $Page->item_id->rowAttributes() ?>>
        <label id="elh_procurements_item_id" for="x_item_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->item_id->caption() ?><?= $Page->item_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->item_id->cellAttributes() ?>>
<span id="el_procurements_item_id">
    <select
        id="x_item_id"
        name="x_item_id"
        class="form-select ew-select<?= $Page->item_id->isInvalidClass() ?>"
        <?php if (!$Page->item_id->IsNativeSelect) { ?>
        data-select2-id="fprocurementsadd_x_item_id"
        <?php } ?>
        data-table="procurements"
        data-field="x_item_id"
        data-value-separator="<?= $Page->item_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->item_id->getPlaceHolder()) ?>"
        <?= $Page->item_id->editAttributes() ?>>
        <?= $Page->item_id->selectOptionListHtml("x_item_id") ?>
    </select>
    <?= $Page->item_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->item_id->getErrorMessage() ?></div>
<?= $Page->item_id->Lookup->getParamTag($Page, "p_x_item_id") ?>
<?php if (!$Page->item_id->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fprocurementsadd", function() {
    var options = { name: "x_item_id", selectId: "fprocurementsadd_x_item_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fprocurementsadd.lists.item_id?.lookupOptions.length) {
        options.data = { id: "x_item_id", form: "fprocurementsadd" };
    } else {
        options.ajax = { id: "x_item_id", form: "fprocurementsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.procurements.fields.item_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->supplier_id->Visible) { // supplier_id ?>
    <div id="r_supplier_id"<?= $Page->supplier_id->rowAttributes() ?>>
        <label id="elh_procurements_supplier_id" for="x_supplier_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->supplier_id->caption() ?><?= $Page->supplier_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->supplier_id->cellAttributes() ?>>
<span id="el_procurements_supplier_id">
    <select
        id="x_supplier_id"
        name="x_supplier_id"
        class="form-select ew-select<?= $Page->supplier_id->isInvalidClass() ?>"
        <?php if (!$Page->supplier_id->IsNativeSelect) { ?>
        data-select2-id="fprocurementsadd_x_supplier_id"
        <?php } ?>
        data-table="procurements"
        data-field="x_supplier_id"
        data-value-separator="<?= $Page->supplier_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->supplier_id->getPlaceHolder()) ?>"
        <?= $Page->supplier_id->editAttributes() ?>>
        <?= $Page->supplier_id->selectOptionListHtml("x_supplier_id") ?>
    </select>
    <?= $Page->supplier_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->supplier_id->getErrorMessage() ?></div>
<?= $Page->supplier_id->Lookup->getParamTag($Page, "p_x_supplier_id") ?>
<?php if (!$Page->supplier_id->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fprocurementsadd", function() {
    var options = { name: "x_supplier_id", selectId: "fprocurementsadd_x_supplier_id" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fprocurementsadd.lists.supplier_id?.lookupOptions.length) {
        options.data = { id: "x_supplier_id", form: "fprocurementsadd" };
    } else {
        options.ajax = { id: "x_supplier_id", form: "fprocurementsadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.procurements.fields.supplier_id.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_procurements_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_procurements_status">
<template id="tp_x_status">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="procurements" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<selection-list hidden
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="procurements"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>></selection-list>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->total_price->Visible) { // total_price ?>
    <div id="r_total_price"<?= $Page->total_price->rowAttributes() ?>>
        <label id="elh_procurements_total_price" for="x_total_price" class="<?= $Page->LeftColumnClass ?>"><?= $Page->total_price->caption() ?><?= $Page->total_price->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->total_price->cellAttributes() ?>>
<span id="el_procurements_total_price">
<input type="<?= $Page->total_price->getInputTextType() ?>" name="x_total_price" id="x_total_price" data-table="procurements" data-field="x_total_price" value="<?= $Page->total_price->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->total_price->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->total_price->formatPattern()) ?>"<?= $Page->total_price->editAttributes() ?> aria-describedby="x_total_price_help">
<?= $Page->total_price->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->total_price->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fprocurementsadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fprocurementsadd", "x_total_price", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procurement_date->Visible) { // procurement_date ?>
    <div id="r_procurement_date"<?= $Page->procurement_date->rowAttributes() ?>>
        <label id="elh_procurements_procurement_date" for="x_procurement_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procurement_date->caption() ?><?= $Page->procurement_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->procurement_date->cellAttributes() ?>>
<span id="el_procurements_procurement_date">
<input type="<?= $Page->procurement_date->getInputTextType() ?>" name="x_procurement_date" id="x_procurement_date" data-table="procurements" data-field="x_procurement_date" value="<?= $Page->procurement_date->EditValue ?>" placeholder="<?= HtmlEncode($Page->procurement_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->procurement_date->formatPattern()) ?>"<?= $Page->procurement_date->editAttributes() ?> aria-describedby="x_procurement_date_help">
<?= $Page->procurement_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procurement_date->getErrorMessage() ?></div>
<?php if (!$Page->procurement_date->ReadOnly && !$Page->procurement_date->Disabled && !isset($Page->procurement_date->EditAttrs["readonly"]) && !isset($Page->procurement_date->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fprocurementsadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fprocurementsadd",
        "x_procurement_date",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fprocurementsadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fprocurementsadd", "x_procurement_date", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fprocurementsadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fprocurementsadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
		</div>
     <!-- /.card-body -->
     </div>
  <!-- /.card -->
</div>
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fprocurementsadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fprocurementsadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("procurements");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fprocurementsadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
