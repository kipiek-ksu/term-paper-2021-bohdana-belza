program poisk;
var a,b,c:integer;
 function findNOD(a,b:integer):integer;
    begin if a*b=0 then findNOD:=a+b
                   else findNOD:=findNOD(a mod b, b mod a);
    end;
begin
  read(a,b);
  c:=findNOD(a,b);
  write(c);
end.