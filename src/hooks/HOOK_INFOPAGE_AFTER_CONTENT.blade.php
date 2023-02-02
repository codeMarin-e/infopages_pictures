                    <x-admin.filepond
                        translations="admin/infopages/infopage.pictures"
                        :routeNamespace="$route_namespace"
                        type="pictures"
                        :inputBag="$inputBag"
                        :accept="'[\'image/*\']'"
                        maxFileSize="1MB"
                        :multiple="true"
                        :attachable="$chInfopage?? null"
                    />
