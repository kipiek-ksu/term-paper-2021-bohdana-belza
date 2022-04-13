program tema6_11;
type masiv=array[1..100] of real;
var n,i,sum: integer;
    mas: masiv;
begin
 read(n);
 for i:=1 to n do
  begin
   mas[i]:=cos(i*i+n);
   write(|',mas[i]:0:2,'| );
  end;
 for i:=1 to n do
  if mas[i]>0 then
   sum:=sum+1;
 write(sum);
end.