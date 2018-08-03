{literal}
    <script>

        CRM.$( document ).ready(function() {
            CRM.$.fn.select2.defaults.formatInputTooShort = function () {
                return (CRM.$(this).data('api-entity') === 'contact') ? "Start typing contact ID, name or email..." : "Start typing contact ID, name or email...";
            };
        });
    </script>
{/literal}