program p6;
var a,s:integer;
   begin
   s:=0;
   read(a);
   while a<>0 do
         begin
          s:=s+(a mod 10);
          a:=a div 10;
         end;
   writeln (s);
   end.