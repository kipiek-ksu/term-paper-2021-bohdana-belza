program D_7_8;
var i,y,n1: integer;
    n: string;
    
begin
 readln(n1);
 n:=inttostr(n1);
 n:=copy(n,length(n),1)+copy(n,2,length(n)-2)+copy(n,1,1);
 val(n,i,y);
 writeln(i);
end.