program AG5_38;
var s,h:integer;

begin
    read(h);
    s:=0;
    while h>0 do
      begin
        s:=s+(h mod 10);
        h:=h div 10
      end;
    write(s)
end.