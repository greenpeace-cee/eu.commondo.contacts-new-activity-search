<table id="contact-id-search">
    <tr class="crm-activity-form-block-target_contact_id2">
        <td class="label">{$form.target_contact_id2.label}</td>
        <td class="view-value">
            {$form.target_contact_id2.html}
            {if $action eq 1 or $single eq false}
                <div class="crm-is-multi-activity-wrapper">
                    {$form.is_multi_activity.html}&nbsp;{$form.is_multi_activity.label} {help id="id-is_multi_activity"}
                </div>
            {/if}
        </td>
    </tr>
</table>

{literal}
    <script>

        CRM.$(".crm-activity-form-block-target_contact_id2").insertAfter(".crm-activity-form-block-target_contact_id");

        CRM.$( document ).ready(function() {

            // Remove table created by this template as soon as it is inserted in the form table.
            CRM.$("#contact-id-search").remove();

            CRM.$('#s2id_target_contact_id2').next('input').attr('data-api-entity', 'contact2');
            CRM.$.fn.select2.defaults.formatInputTooShort = function () {
                return (CRM.$(this).data('api-entity') === 'contact2') ? "Start typing contact ID..." : "Enter search term...";
            };


            // Submit 'Contact with by ID' field as it was normal field 'Contact with'
            // This is created to editing core, instead Contact ID's from newly added field will be submitted and processed normally like it was old field added in core.
            CRM.$("form[name=Activity]").submit(function () {

                var wcid = CRM.$("[name=target_contact_id2]").val();

                // Correct values to prevent false submission.
                if (wcid !== '') {
                        if(CRM.$("[name=target_contact_id]").val()) {
                            CRM.$("[name=target_contact_id]").val(CRM.$("[name=target_contact_id]").val() + ',' + CRM.$("[name=target_contact_id2]").val());
                        } else {
                            CRM.$("[name=target_contact_id]").val(CRM.$("[name=target_contact_id2]").val());
                        }
                    }
            });
        });
    </script>
{/literal}