programl9z20;
var
   n:byte;
   rf:longint;
   Function f(x:byte):longint;
   var
      y:byte;
   begin
        if x=0 then
           f:=0
        else
           if x=1 then
              f:=2
              else
                  if x=2 then
                     f:=4
                     else
                         begin
                               y:=x-3;
                               f:=f(y+2)-2*f(y+1)
                         end
   end;
begin
     read(n);
     rf:=f(n);
     write(rf)
end.