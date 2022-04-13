program l2 3;
var B,prc:real;
    years:byte;

begin
  Readln(B,prc,years);
  prc:= prc/100;
  while (years>0) do
  begin
    B:= B+B*prc;
    dec(years);
  end;
  writeln(B:0:2);
end.