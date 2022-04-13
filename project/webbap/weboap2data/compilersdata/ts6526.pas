program revers;
var i,k,n,a: integer;
    n1,v: string;
begin
 read(n);
 n1:=inttostr(n);
 for i:=length(n1) downto 1 do
  v:=v+n1[i];
 val(v,a,k);
 writeln(a);
end.