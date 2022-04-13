program klas;
type
  klasss=record
  sername:string[30];
  name:string[20];
  firstname:string[20];
  street:string[35];
  house:integer;
  flat:integer;
  isTel:integer;
  tel:integer;
end;
var
  n:integer;
  kls:array[1..255] of klasss;
  i:integer;
begin
  read(n);
  for i:=1 to n do
            with kls[i] do
                     begin
                       write('sername:');
                       read(sername);
                       write('name:');
                       read(name);
                       write('firstname:');
                       read(firstname);
                       write('street:');
                       read(street);
                       write('house:');
                       read(house);
                       write('flat:');
                       read(flat);
                       write('isTel:');
                       read(isTel);
                       write('tel:');
                       read(tel);
                     end;
           for i:=1 to n do with kls[i] do
                             begin
                               if (isTel=0) THEN
                               write(sername,' ',name,' ',firstname,' ',street,' ',house,' ',flat,' ',isTel,' ',tel);
                             end;

end.


