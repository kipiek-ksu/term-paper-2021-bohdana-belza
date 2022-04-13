program T3z27;
var v,s,t:real;
procedure vst(v,s:longint; var t:longint);
begin
read(v,s);
t:=s/v;
end;
begin
vst(v,s,t);
write(t:0:2);
end.
