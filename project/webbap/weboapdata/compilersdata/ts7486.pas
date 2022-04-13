Program T3z27;
var v:real;s:real; t:real;
procedure svt(v:real;s:real;var t:real);
begin
Read(v,s);
t:=s/v;
end;
Begin
svt(v,s,t);
Write(t:4:2);
End.